<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Setting::first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settings = Setting::first();
        $settings->update(['settings'=>$request->all()]);
        return response()->json($settings->settings,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $requestData = $request->all();
        $settings = Setting::first();
        $filename ='';$filename_ar ='';
        if($logo = $request->file('logo')){
            $extension = $logo->getClientOriginalExtension();
            $filename  = 'logo-' . time() . '.' . $extension;
            $path      = $logo->storeAs('settings', $filename);
            $requestData['logo'] = $filename;
        }
        if($logo_ar = $request->file('logo_ar')){
            $extension = $logo_ar->getClientOriginalExtension();
            $filename_ar  = 'logo-ar-' . time() . '.' . $extension;
            $path      = $logo_ar->storeAs('settings', $filename_ar);
            $requestData['logo_ar'] = $filename_ar;
        }


        $settings->update(['settings'=>json_encode($requestData)]);
        return response()->json($settings->settings,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
