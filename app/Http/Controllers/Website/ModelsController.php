<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ModelBrand;

class ModelsController extends Controller
{
    public function show($id)
    {
        $models = ModelBrand::get();
        $model = ModelBrand::with('getImages')->where('id', $id)->first();
        return view('website.model', compact(['model', 'models']));
    }
}
