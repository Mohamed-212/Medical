<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySetups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
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
     * Display a company information.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setup = CompanySetups::get()->keyBy('key')->toArray();
        return view('admin.company_info.edit', compact(['setup']));
    }

    /**
     * Update the company info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $setup_model = new CompanySetups();
        $validator = Validator::make($request->all(), $setup_model->validation_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $setup_array = [
            ['key' => 'about_us_ar', 'value' => $request->about_us_ar],
            ['key' => 'about_us_en', 'value' => $request->about_us_en],
            ['key' => 'address_ar', 'value' => $request->address_ar],
            ['key' => 'address_en', 'value' => $request->address_en],
            ['key' => 'mobile', 'value' => $request->mobile],
            ['key' => 'telephone', 'value' => $request->telephone],
            ['key' => 'email', 'value' => $request->email],
            ['key' => 'facebook', 'value' => $request->facebook],
            ['key' => 'twitter', 'value' => $request->twitter],
        ];
        foreach ($setup_array as $setup){
            CompanySetups::where('key', $setup['key'])->updateOrCreate($setup);
        }
        return redirect()->route('admin.company.index')->with('success', __('dashboard.process_successfully'));
    }
}
