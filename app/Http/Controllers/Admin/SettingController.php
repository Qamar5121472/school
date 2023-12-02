<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingService;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function createAboutUs(Request $request){
        try{

            $about = $this->settingService->saveAbout($request->all());


            return view('admin.settings.aboutUs',compact('about'));
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }
    public function about(){
        try{
            $about = $this->settingService->about();


            return view('admin.settings.aboutUs',compact('about'));
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }
    public function setting()
    {
        try{

            $data =$this->settingService->settingInfo();

            return view('admin.settings.setting',compact('data'));
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function saveSetting(Request $request)
    {
        try{
            $data = $this->settingService->saveAdminSetting($request->all());
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return view('admin.settings.setting',compact('data'));
        }catch(Exception $exception){
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
        try{
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return redirect()->route('admissionList');
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        try{
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return redirect()->route('admissionList');
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        try{
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return redirect()->route('admissionList');
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        try{
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return redirect()->route('admissionList');
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        try{
            $alert['type'] = 'success';
            $alert['message'] = 'Status Updated Successfully';
            return redirect()->route('admissionList');
        }catch(Exception $exception){
            $alert['type'] = 'danger';
            $alert['message'] = 'SomeThing went wrong';
            return redirect()->back()->with('alert', $alert);
        }
    }
}
