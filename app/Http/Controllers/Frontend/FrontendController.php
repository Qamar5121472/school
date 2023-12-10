<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\enquery;
use App\Models\frontend;
use App\Models\Setting;
use App\Services\StudentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    protected $studentService;
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     */

    public function teacherRegistration(Request $request){
        try{
            $request->validate([
                'teacher_name' =>'required',
                'natinality' => 'required',
                'cnicNo' => 'required',
                'cnciFrontImage' => 'required',
                'cnciBackImage' => 'required',
                'father_name' => 'required',
                'fatherIdCardNo' => 'required',
                'fatherIdCartFrontImage' => 'required|mimes:jpeg,png,PNG,JPG,JPEG,pdf',
                'fatherIdCartBackImage' => 'required|mimes:jpeg,png,PNG,JPG,JPEG,pdf',
                'qualification' => 'required',
                'fscResultCard' => 'required|mimes:jpeg,png,PNG,JPG,JPEG,pdf',
                'bsCertificate' => 'required|mimes:jpeg,png,PNG,JPG,JPEG,pdf',
                'contactNo' => 'required',
                'anyOtherTraning' => 'required',
                'experiance' => 'required',
            ]);


               $data =  $this->studentService->teacherRegistration($request);
               if($data =='success'){
                $alert['type'] = 'success';
                $alert['message'] = 'Your request Submitted successfullywe will let you soon! Thank You';
                return redirect()->back()->with('alert',$alert);
            }else{
                $alert['type'] = 'error';
                $alert['message'] = 'Something went wrong';
                return redirect()->back()->with('alert',$alert);
            }

        }catch(Exception $exception){
            $alert['type'] = 'error';
            $alert['message'] = 'Something went wrong';
            return redirect()->back()->with('alert',$alert);
        }
    }
    public function requestForAppointment(Request $request){
        // dd($request->all());

        try{
            DB::beginTransaction();
            $model = new enquery();
            $model->first_name =  $request->first_name;
            $model->last_name = $request->last_name;
            $model->phone_no = $request->phone;
            $model->class = $request->class;
            $model->message = $request->message;
            $model->save();
            DB::commit();
            if(isset($model)){
                $success = 'success';
                $message = 'Submit Your request Sucessfully we will contact to you in while!';
                return response()->json(['success' => $success, 'message' => $message]);
            }else{
                $error = '';
                $message = 'Something went wrong!';
                return response()->json(['error' => $error, 'message' => $message]);
            }

        }catch(Exception $exception){
            DB::rollBack();
            $error = '';
            $message = 'Something went wrong!';
            return response()->json(['error' => $error, 'message' => $message]);
        }

    }


     public function joinUs(){
        try{
            return view('frontend.teacherRegister.register');
        }catch(Exception $exception){
            $alert['type'] = 'error';
            $alert['message'] = 'Something went wrong';
            return redirect()->back()->with('alert',$alert);
        }
     }
    public function index()
    {
        try{
            return view('frontend.home.index');
        }catch(Exception $exception){
            $alert['type'] = 'error';
            $alert['message'] = 'Something went wrong';
            return redirect()->back()->with('alert',$alert);
        }
    }

    public function createAddmission(Request $request){
        try{
            $request->validate([
                'student_name' => 'required',
                'father_name' => 'required',
                'natinality' => 'required',
                'studentBFormNo' => 'required|numeric',
                'fatherIdCardNo' => 'required|numeric',
                'class' => 'required|numeric',
                'previousSchoolName' => 'required',
                'fatherOccupation' => 'required',
                'fatherSalary' => 'required',
                'numberOfSublings' => 'required|numeric',
                'motherName' => 'required',
                'motherIdCartNo' => 'required|numeric',
                'fatherEducation' => 'required',
                'motherEducation' => 'required',
                'contactNo' => 'required',
                'studentImage' => 'required|mimes:jpeg,png,PNG,JPG,JPEG,pdf',
                'studenBFormImage' => 'required|mimes:jpeg,png,PNG,JPG,JPEG,pdf',
                'fatherIdCartFrontImage' => 'required_without:motherIdCartFrontImage|mimes:jpeg,png,jpg,pdf',
                'fatherIdCartBackImage' => 'required_without:motherIdCardBack|mimes:jpeg,png,jpg,pdf',
                'previousSchoolCertificateImage' => 'required|mimes:jpeg,png,PNG,JPG,JPEG,pdf',
                'motherIdCartFrontImage' => 'required_without:fatherIdCartFrontImage|mimes:jpeg,png,jpg,pdf',
                'motherIdCardBack' => 'required_without:fatherIdCardBackImage|mimes:jpeg,png,jpg,pdf',
            ]);


            $data = $this->studentService->regiaterStudent($request);
            if($data =='success'){
                $alert['type'] = 'success';
                $alert['message'] = 'Your request Submitted successfullywe will let you soon! Thank You';
                return redirect()->back()->with('alert',$alert);
            }else{
                $alert['type'] = 'error';
                $alert['message'] = 'Something went wrong';
                return redirect()->back()->with('alert',$alert);
            }


        }catch(Exception $exception){
            // dd($exception->getMessage());
            $alert['type'] = 'error';
            $alert['message'] = $exception->getMessage();
            return redirect()->back()->with('alert',$alert);
        }
    }



    public function addmission(){
        try{
            return view('frontend.admission.addmission');
        }catch(Exception $exception){
            return redirect()->back()->with('error','somthing went wrong');
        }
    }

    public function courses(){
        try{
            return view('frontend.courses.courses');
        }catch(Exception $exception){
            return redirect()->back()->with('error','something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function aboutUs()
    {
        try{
            $about = Setting::first();
            return view('frontend.about.about',compact('about'));
        }catch(Exception $exception){
            return redirect()->back()->with('error','someting went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contact(Request $request)
    {
        try{
            return view('frontend.contact.contact');
        }catch(Exception $exception){
            return redirect()->back()->with('error','something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function teacher(frontend $frontend)
    {
        try{
            return view('frontend.teachers.teacher');
        }catch(Exception $exception){
            return redirect()->back()->with('error','something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(frontend $frontend)
    {
        //
    }
}
