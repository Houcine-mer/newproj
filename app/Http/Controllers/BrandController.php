<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //


    function loadBrands() {
        return response()->json(Brand::all());
    }

    function loadBrand(Request $request){
        $brandName = request()->route('name');
        $brand = Brand::where('name' , $brandName)->first();
        if(!$brand) return response()->json([
            'message' => "brand not found"
        ]);
        return response()->json($brand);
    }

    function createBrand(Request $request) {
        $count = Brand::count();
        if ($count >= 10) {
            return response()->json([
                'message' => 'Cannot add more than 10 brands'
            ], 400);
        }
        $data = $request->validate(
            [
                'name' => 'required|string',
            ]
        );
        $newbrand = Brand::create($data);

        return response()->json([
            'message' => "brand created",
        ]);
    }

    function deleteBrand(Request $request){
        $brandName = request()->route('name');

        $deletedBrand = Brand::where('name' ,$brandName)->first();
        if(!$deletedBrand) return response()->json([
            'message' => "brand not found",
        ],400);

        $deletedBrand->delete();
        return response()->json([
            'message' => "brand deleted",
        ]);
    }



    function updateBrand(Request $request){
        $currentBrandName = request()->route('name');
        $data = $request->validate([
            'name' => 'required|string',
        ]);
        $updatedBrand = Brand::where('name' , $currentBrandName)->first();
        if(!$updatedBrand) return response()->json([
            'message' => "brand not found",
        ],400);
        $updatedBrand->update($data);

        return response()->json($updatedBrand);
    }
}
