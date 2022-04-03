<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Device;
use App\Models\ModelBrand;
use App\Models\ModelImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ModelController extends Controller
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
        $models = ModelBrand::with('getBrand')->get();
        return view('admin.model.index', compact(['models']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get();
        $brands = $brands->pluck('name','id');
        return view('admin.model.create', compact(['brands']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model_model = new ModelBrand();
        $validator = Validator::make($request->all(), $model_model->validation_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $model_model->modeel = $request->modeel;
        $model_model->brand = $request->brand;
        $model_model->availability = $request->availability;
        $model_model->condition = $request->condition;
        $model_model->description_en = $request->description_en;
        $model_model->description_ar = $request->description_ar;
        $model_model->brand_id = $request->brand_id;
        $model_model->save();
        $array_images = [];
        foreach ($request->file('images') as $image){
            $image->store('public/models/' . $model_model->id);
            $array_images[] = ['model_id' => $model_model->id, 'image' => $image->hashName()];
        }
        ModelImages::insert($array_images);
        return redirect()->route('admin.models.index')->with('success', __('dashboard.process_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = ModelBrand::with(['getBrand', 'getImages'])->where('id', $id)->first();
        if($model){
            return view('admin.model.show', compact(['model']));
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
        $model = ModelBrand::with(['getBrand', 'getImages'])->where('id', $id)->first();
        if($model){
            $brands = Brand::get();
            $brands = $brands->pluck('name','id');
            return view('admin.model.edit', compact(['model', 'brands']));
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
        $model = ModelBrand::with('getImages')->where('id', $id)->first();
        if($model){
            $model_model = new ModelBrand();
            $validator = Validator::make($request->all(), $model_model->edit_validation_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $model->modeel = $request->modeel;
            $model->brand = $request->brand;
            $model->availability = $request->availability;
            $model->condition = $request->condition;
            $model->description_en = $request->description_en;
            $model->description_ar = $request->description_ar;
            $model->brand_id = $request->brand_id;
            $model->save();
            $array_images = [];
            if($request->file('images')){
                ModelImages::where('model_id', $id)->delete();
                foreach ($model->getImages as $image){
                    Storage::delete('public/models/' . $id . '/' . $image);
                }
                foreach ($request->file('images') as $image){
                    $image->store('public/models/' . $id);
                    $array_images[] = ['model_id' => $id, 'image' => $image->hashName()];
                }
                ModelImages::insert($array_images);
            }
            return redirect()->route('admin.models.index')->with('success', __('dashboard.process_successfully'));
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
        $model = ModelBrand::where('id', $id)->first();
        if($model){
            $model->delete();
            return redirect()->route('admin.models.index');
        }else{
            return redirect()->back()->with('error', __('dashboard.id_not_exist'));
        }
    }
}
