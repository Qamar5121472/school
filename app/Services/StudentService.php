<?php


namespace App\Services;

use App\Models\Addmission;
use App\Models\Document;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentService{
    public function regiaterStudent($register){
        try{
            // dd($register);
            DB::beginTransaction();

            $document = new Document();
            // $document->picture = $register->studentImage;
            if($register->hasFile('picture')){

                $image=$register->file('picture');

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
            $model->mother_name = $register->contactNo;
            $model->mother_id_card_number = $register->motherIdCartNo;
            $model->father_education = $register->fatherEducation;
            $model->mother_education = $register->motherEducation;
            $model->contact_number = $register->contactNo;
            $model->document_id = $document->id;
            $model->save();
            DB::commit();
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return $alert;
        }catch(Exception $exception){
            DB::rollBack();
            $alert['type'] = 'danger';
            $alert['message'] = 'Status Updated Successfully';
            return redirect()->back()->with('alert', $alert);
        }
    }
}
