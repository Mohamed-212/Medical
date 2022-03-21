<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceImages;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
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
        $services = Services::get();
        return view('admin.service.index', compact(['services']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service_model = new Services();
        $validator = Validator::make($request->all(), $service_model->validation_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $service_model->name_ar = $request->name_ar;
        $service_model->name_en = $request->name_en;
        $service_model->description_en = $request->description_en;
        $service_model->description_ar = $request->description_ar;
        $service_model->save();
        $array_images = [];
        foreach ($request->file('images') as $image){
            $image->store('public/services/' . $service_model->id);
            $array_images[] = ['service_id' => $service_model->id, 'image' => $image->hashName()];
        }
        ServiceImages::insert($array_images);
        return redirect()->route('admin.services.index')->with('success', __('dashboard.process_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Services::with('getImages')->where('id', $id)->first();
        if($service){
            return view('admin.service.show', compact(['service']));
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
        $service = Services::with('getImages')->where('id', $id)->first();
        if($service){
            return view('admin.service.edit', compact(['service']));
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
        $service = Services::with('getImages')->where('id', $id)->first();
        if($service){
            $service_model = new Services();
            $validator = Validator::make($request->all(), $service_model->edit_validation_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $service->name_ar = $request->name_ar;
            $service->name_en = $request->name_en;
            $service->description_en = $request->description_en;
            $service->description_ar = $request->description_ar;
            $service->save();
            $array_images = [];
            if($request->file('images')){
                ServiceImages::where('service_id', $id)->delete();
                foreach ($service->getImages as $image){
                    Storage::delete('public/services/' . $id . '/' . $image);
                }
                foreach ($request->file('images') as $image){
                    $image->store('public/services/' . $id);
                    $array_images[] = ['service_id' => $id, 'image' => $image->hashName()];
                }
                ServiceImages::insert($array_images);
            }
            return redirect()->route('admin.services.index')->with('success', __('dashboard.process_successfully'));
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
        $service = Services::where('id', $id)->first();
        if($service){
            $service->delete();
            return redirect()->route('admin.services.index');
        }else{
            return redirect()->back()->with('error', __('dashboard.id_not_exist'));
        }
    }
}
