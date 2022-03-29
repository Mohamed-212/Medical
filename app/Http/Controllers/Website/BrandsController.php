<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ModelBrand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index(Request $request, $id)
    {
        $name = $request->name;
        $like_search = ($name)? '%'.$name.'%' : '%' ;
        $brand = Brand::with(['getModels' => function($query) use($like_search){
            $query->where('modeel', 'LIKE', $like_search)->orWhere('brand', 'LIKE', $like_search)->paginate(8);
        }])->where('id', $id)->first();
        $models = ModelBrand::where('brand_id', $id)->where(function($query) use($like_search){
            $query->where('modeel', 'LIKE', $like_search)->orWhere('brand', 'LIKE', $like_search);
        })->paginate(8);
        return view('website.brand', compact(['brand', 'models', 'name']));
    }
}
