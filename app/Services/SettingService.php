<?php


namespace App\Services;

use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\DB;

class SettingService{
    public function settingInfo(){
        $data = Setting::first();
        return $data;
    }

    public function saveAdminSetting($request){
        try{
            DB::beginTransaction();
            $data = Setting::first();
            if(isset($data)){

                $data->phone_no = $request['phone_no'];
                $data->name = $request['schoolName'];
                if(isset($request['logo']) && $request['logo']!=null){

                    $image=$request['logo'];

                    $ext=$image->extension();
                    $image_name = time().'.'.$ext;

                    $image->move(public_path('logo'), $image_name);
                    $data->logo= $image_name;

                 }else{
                    $data->logo= $data->logo;
                 }
                 $data->email =  $request['email'];
                $data->save();
                return $data;
            }else{
                $model = new Setting();
                $model->phone_no = $request['phone_no'];
                $model->name = $request['schoolName'];
                if(isset($request['logo']) && $request['logo']!=null){

                    $image=$request['logo'];

                    $ext=$image->extension();
                    $image_name = time().'.'.$ext;

                    $image->move(public_path('logo'), $image_name);
                    $model->logo= $image_name;

                 }else{
                    $model->logo= $data->logo;
                 }
                 $model->email =  $request['email'];
                return $model;
            }
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
            DB::rollBack();
            return $exception;
        }
    }

    public function saveAbout($saveData){
        try{
            DB::beginTransaction();
            $data = Setting::first();
            if(isset($data)){

                $data->aboutUs = $saveData['aboutUs'];
                $data->save();
                return $data;
            }else{
                $model = new Setting();
                $model->aboutUs = $saveData['aboutUs'];
                $model->save();
                return $model;
            }
            DB::commit();
        }catch(Exception $exception){

            DB::rollBack();
            return $exception;
        }

    }


    public function about(){
        $aboutData = Setting::first();
        return $aboutData;
    }
}
