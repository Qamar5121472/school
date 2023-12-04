<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\frontend;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return view('frontend.home.index');
        }catch(Exception $exception){

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(frontend $frontend)
    {
        //
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
