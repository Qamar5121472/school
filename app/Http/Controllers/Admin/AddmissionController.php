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
        //
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
            dd($request->all());
            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
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
    public function show(Addmission $addmission)
    {
        //
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
    public function update(Request $request, Addmission $addmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Addmission $addmission)
    {
        //
    }
}
