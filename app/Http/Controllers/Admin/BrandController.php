<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
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
        $brands = Brand::with('getDevice')->get();
        $devices = Device::get();
        $devices = $devices->pluck('name','id');
        return view('admin.brand.index', compact(['brands', 'devices']));
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
        $brand_model = new Brand();
        $validator = Validator::make($request->all(), $brand_model->validation_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $brand_model->name_ar = $request->name_ar;
        $brand_model->name_en = $request->name_en;
        $brand_model->device_id = $request->device_id;
        $brand_model->save();
        return redirect()->route('admin.brands.index')->with('success', __('dashboard.process_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::where('id', $id)->first();
        if($brand){
            return view('admin.brand.show', compact(['brand']));
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
        $brand = Brand::where('id', $id)->first();
        if($brand){
            $devices = Device::get();
            $devices = $devices->pluck('name','id');
            return view('admin.brand.edit', compact(['brand', 'devices']));
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
        $brand = Brand::where('id', $id)->first();
        if($brand){
            $brand_model = new Brand();
            $validator = Validator::make($request->all(), $brand_model->validation_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $brand->name_ar = $request->name_ar;
            $brand->name_en = $request->name_en;
            $brand->device_id = $request->device_id;
            $brand->save();
            return redirect()->route('admin.brands.index')->with('success', __('dashboard.process_successfully'));
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
        $brand = Brand::where('id', $id)->first();
        if($brand){
            $brand->delete();
            return redirect()->route('admin.brands.index');
        }else{
            return redirect()->back()->with('error', __('dashboard.id_not_exist'));
        }
    }
}
