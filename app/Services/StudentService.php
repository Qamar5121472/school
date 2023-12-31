<?php


namespace App\Services;

use App\Models\Addmission;
use App\Models\Document;
use Exception;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class StudentService{

    public function getDetail($id){
        $data = Addmission::where('id',$id)->with('doc')->first();
        return $data;
    }
    public function updateInformation($register){
        try{
            // dd($register);
            DB::beginTransaction();

            $document = Document::where('id',$register->documentId)->first();
            // $document->picture = $register->studentImage;
            if($register->hasFile('studentImage')){

                $image=$register->file('studentImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->picture= $image_name;

             }else{
                $document->picture= $document->picture;;
             }
            // $document->std_bform_picture = $register->studenBFormImage;
            if($register->hasFile('studenBFormImage')){

                $image=$register->file('studenBFormImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->std_bform_picture= $image_name;

             }else{
                $document->std_bform_picture= $document->std_bform_picture;
             }
            // $document->father_id_picture_front = $register->fatherIdCartFrontImage;
            if($register->hasFile('fatherIdCartFrontImage')){

                $image=$register->file('fatherIdCartFrontImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->father_id_picture_front= $image_name;

             }else{
                $document->father_id_picture_front= $document->father_id_picture_front;
             }
            // $document->father_id_picture_back = $register->fatherIdCartBackImage;
            if($register->hasFile('fatherIdCartBackImage')){

                $image=$register->file('fatherIdCartBackImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->father_id_picture_back= $image_name;

             }else{
                $document->father_id_picture_back= $document->father_id_picture_back;
             }
            // $document->previous_school_certificate_pic = $register->previousSchoolCertificateImage;
            if($register->hasFile('previousSchoolCertificateImage')){

                $image=$register->file('previousSchoolCertificateImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->previous_school_certificate_pic= $image_name;

             }else{
                $document->previous_school_certificate_pic= $document->previous_school_certificate_pic;
             }
            // $document->mother_id_card_picture_front = $register->motherIdCartFrontImage;
            if($register->hasFile('motherIdCartFrontImage')){

                $image=$register->file('motherIdCartFrontImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->mother_id_card_picture_front= $image_name;

             }else{
                $document->mother_id_card_picture_front= $document->mother_id_card_picture_front;
             }
            // $document->mother_id_card_picture_back = $register->motherIdCardBack;
            if($register->hasFile('motherIdCardBack')){

                $image=$register->file('motherIdCardBack');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->mother_id_card_picture_back= $image_name;

             }else{
                $document->mother_id_card_picture_back= $document->mother_id_card_picture_back;
             }
            $document->save();


            $model = Addmission::where('id',$register->id)->first();
            $model->first_name = $register->student_name;
            $model->last_name = $register->student_name;
            $model->father_name = $register->father_name;
            $model->natinality = $register->natinality;
            $model->std_bform_no = $register->studentBFormNo;
            $model->father_id_card_no = $register->fatherIdCardNo;
            $model->class = $register->class;
            $model->previous_school = $register->previousSchoolName;
            $model->father_occupation = $register->fatherOccupation;
            $model->father_salary = $register->fatherSalary;
            $model->no_of_sublings = $register->numberOfSublings;
            $model->mother_name = $register->contactNo;
            $model->mother_id_card_number = $register->motherIdCartNo;
            $model->father_education = $register->fatherEducation;
            $model->mother_education = $register->motherEducation;
            $model->contact_number = $register->contactNo;
            $model->document_id = $document->id ?? $register->documentId;
            $model->save();
            DB::commit();
            $alert['type'] = 'success';
            $alert['message'] = 'Information Updated Successfully';
            return $alert;
        }catch(Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
            $alert['type'] = 'danger';
            $alert['message'] = 'Something went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    public function teacherRegistration($request){
        try{
            DB::beginTransaction();
            $model = new Teacher();
            $model->name = $request->teacher_name;
            $model->cnic = $request->cnicNo;

            if($request->hasFile('cnciFrontImage')){

                $image=$request->file('cnciFrontImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $model->cnic_front_image = $image_name;

             }

             if($request->hasFile('cnciBackImage')){

                $image=$request->file('cnciBackImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $model->cnic_back_image = $image_name;

             }



            $model->father_name = $request->father_name;
            $model->father_cnic_no = $request->fatherIdCardNo;
            $model->nationality = $request->natinality;

            if($request->hasFile('fatherIdCartFrontImage')){

                $image=$request->file('fatherIdCartFrontImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $model->father_cnic_front_image = $image_name;

             }


             if($request->hasFile('fatherIdCartBackImage')){

                $image=$request->file('fatherIdCartBackImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $model->father_cnic_back_image = $image_name;

             }

            $model->qualification = $request->qualification;


            if($request->hasFile('fscResultCard')){

                $image=$request->file('fscResultCard');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $model->fsc_doc_image = $image_name;

             }


             if($request->hasFile('bsCertificate')){

                $image=$request->file('bsCertificate');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $model->ba_doc_image = $image_name;

             }

            $model->contact_no = $request->contactNo;
            $model->traning = $request->anyOtherTraning;
            $model->experiance = $request->experiance;

             $model->save();





            DB::commit();
            return 'success';
        }catch(Exception $exception){
            DB::rollBack();
            // dd($exception->getMessage());
            $alert['type'] = 'danger';
            $alert['message'] = 'Something went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }




    public function regiaterStudent($register){
        try{
            // dd($register);
            DB::beginTransaction();

            $document = new Document();
            // $document->picture = $register->studentImage;
            if($register->hasFile('studentImage')){

                $image=$register->file('studentImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->picture= $image_name;

             }
            // $document->std_bform_picture = $register->studenBFormImage;
            if($register->hasFile('studenBFormImage')){

                $image=$register->file('studenBFormImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->std_bform_picture= $image_name;

             }
            // $document->father_id_picture_front = $register->fatherIdCartFrontImage;
            if($register->hasFile('fatherIdCartFrontImage')){

                $image=$register->file('fatherIdCartFrontImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->father_id_picture_front= $image_name;

             }
            // $document->father_id_picture_back = $register->fatherIdCartBackImage;
            if($register->hasFile('fatherIdCartBackImage')){

                $image=$register->file('fatherIdCartBackImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->father_id_picture_back= $image_name;

             }
            // $document->previous_school_certificate_pic = $register->previousSchoolCertificateImage;
            if($register->hasFile('previousSchoolCertificateImage')){

                $image=$register->file('previousSchoolCertificateImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->previous_school_certificate_pic= $image_name;

             }
            // $document->mother_id_card_picture_front = $register->motherIdCartFrontImage;
            if($register->hasFile('motherIdCartFrontImage')){

                $image=$register->file('motherIdCartFrontImage');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->mother_id_card_picture_front= $image_name;

             }
            // $document->mother_id_card_picture_back = $register->motherIdCardBack;
            if($register->hasFile('motherIdCardBack')){

                $image=$register->file('motherIdCardBack');

                $ext=$image->extension();
                $image_name = time().'.'.$ext;

                $image->move(public_path('images/documents'), $image_name);
                $document->mother_id_card_picture_back= $image_name;

             }
            $document->save();


            $model = new Addmission();
            $model->first_name = $register->student_name;
            $model->last_name = $register->student_name;
            $model->father_name = $register->father_name;
            $model->natinality = $register->natinality;
            $model->std_bform_no = $register->studentBFormNo;
            $model->father_id_card_no = $register->fatherIdCardNo;
            $model->class = $register->class;
            $model->previous_school = $register->previousSchoolName;
            $model->father_occupation = $register->fatherOccupation;
            $model->father_salary = $register->fatherSalary;
            $model->no_of_sublings = $register->numberOfSublings;
            $model->mother_name = $register->motherName ?? '-';
            $model->mother_id_card_number = $register->motherIdCartNo;
            $model->father_education = $register->fatherEducation;
            $model->mother_education = $register->motherEducation;
            $model->contact_number = $register->contactNo;
            $model->document_id = $document->id;
            $model->save();
            DB::commit();
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return 'success';
        }catch(Exception $exception){
            DB::rollBack();
            // dd($exception->getMessage());
            $alert['type'] = 'danger';
            $alert['message'] = 'Something went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }
}
