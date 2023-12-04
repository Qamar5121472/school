<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addmission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\StudentService;

class AddmissionController extends Controller
{

    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $admission = Addmission::get();
            return view('admin.addmission.admissionList',compact('admission'));
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function createAddmission(){
        try{
            return view('admin.addmission.create');
        }catch(Exception $exception){
            return redirect()->back()->with('error','Something went wrong');
        }
    }
    public function create(Request $request)
    {
        try{
            DB::beginTransaction();

            $this->studentService->regiaterStudent($request);
            // dd($request->all());
            DB::commit();
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return redirect()->route('admissionList');
        }catch(Exception $exception){
            dd($exception->getMessage());
            DB::rollBack();
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    public function updateInfo(Request $request){
        try{
            DB::beginTransaction();
            $alert = $this->studentService->updateInformation($request);
            return redirect()->route('admissionList')->with($alert);
            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        try{
            $data = $this->studentService->getDetail($id);
            return view('admin.addmission.detail',compact('data'));
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Addmission $addmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        try{
            $data = $this->studentService->getDetail($id);
            return view('admin.addmission.upate',compact('data'));
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try{
            Addmission::find($id)->delete();
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return redirect()->route('admissionList')->with($alert);
        }catch(Exception $exception){
            DB::rollBack();
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }


    public function logout(){
        try{
            session()->flush();
            cache()->clear();
            return redirect()->url('/');
        }catch(Exception $exception){
            return redirect()->back()->with('error','something went wrong');
        }
    }
}
