<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Session;
use App\Http\Request\ProductStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\storage;

//use Illuminate\Routing\ResponseFactory;


class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // All products
        $products = product::all();

        // return jason response
        return response()->json([
            'products'=> $products
        ],200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            
            $imageName = str::random(32).".".$request->image->getClientOriginalExtention();

            // create product
            product::create([

                'name' => $request->name,
                'image' => $imageName,
                'description' => $request->description

            ]);

            // save image
            Storage::disk('public')->put($imageName, file_get_contents($request->image));

            return response()->json([
                'message'=> "Product Successfuly Created!"
            ],500);

        } catch (\exception $e) {

            return response()->json([
                'message'=> "Somthing went wrong. Please try again!"
            ],500);
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
