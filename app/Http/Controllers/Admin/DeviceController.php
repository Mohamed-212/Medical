<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::get();
        return view('admin.device.index', compact(['devices']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device_model = new Device();
        $validator = Validator::make($request->all(), $device_model->validation_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $device_model->name_ar = $request->name_ar;
        $device_model->name_en = $request->name_en;
        $device_model->save();
        return redirect()->route('admin.devices.index')->with('success', __('dashboard.process_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::where('id', $id)->first();
        if($device){
            return view('admin.device.show', compact(['device']));
        }else{
            return redirect()->back()->with('error', __('dashboard.id_not_exist'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::where('id', $id)->first();
        if($device){
            return view('admin.device.edit', compact(['device']));
        }else{
            return redirect()->back()->with('error', __('dashboard.id_not_exist'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $device = Device::where('id', $id)->first();
        if($device){
            $device_model = new Device();
            $validator = Validator::make($request->all(), $device_model->validation_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $device->name_ar = $request->name_ar;
            $device->name_en = $request->name_en;
            $device->save();
            return redirect()->route('admin.devices.index')->with('success', __('dashboard.process_successfully'));
        }else{
            return redirect()->back()->with('error', __('dashboard.id_not_exist'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::where('id', $id)->first();
        if($device){
            $device->delete();
            return redirect()->route('admin.devices.index');
        }else{
            return redirect()->back()->with('error', __('dashboard.id_not_exist'));
        }
    }
}
