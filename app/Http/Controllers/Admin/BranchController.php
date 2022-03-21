<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
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
        $branches = Branches::get();
        return view('admin.branch.index', compact(['branches']));
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
        $branch_model = new Branches();
        $validator = Validator::make($request->all(), $branch_model->validation_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $branch_model->name_ar = $request->name_ar;
        $branch_model->name_en = $request->name_en;
        $branch_model->address_ar = $request->address_ar;
        $branch_model->address_en = $request->address_en;
        $branch_model->telephone = $request->telephone;
        $branch_model->mobile = $request->mobile;
        $branch_model->email = $request->email;
        $branch_model->save();
        return redirect()->route('admin.branches.index')->with('success', __('dashboard.process_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branches::where('id', $id)->first();
        if($branch){
            return view('admin.branch.show', compact(['branch']));
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
        $branch = Branches::where('id', $id)->first();
        if($branch){
            return view('admin.branch.edit', compact(['branch']));
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
        $branch = Branches::where('id', $id)->first();
        if($branch){
            $branch_model = new Branches();
            $validator = Validator::make($request->all(), $branch_model->validation_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $branch->name_ar = $request->name_ar;
            $branch->name_en = $request->name_en;
            $branch->address_ar = $request->address_ar;
            $branch->address_en = $request->address_en;
            $branch->telephone = $request->telephone;
            $branch->mobile = $request->mobile;
            $branch->email = $request->email;
            $branch->save();
            return redirect()->route('admin.branches.index')->with('success', __('dashboard.process_successfully'));
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
        $branch = Branches::where('id', $id)->first();
        if($branch){
            $branch->delete();
            return redirect()->route('admin.branches.index');
        }else{
            return redirect()->back()->with('error', __('dashboard.id_not_exist'));
        }
    }
}
