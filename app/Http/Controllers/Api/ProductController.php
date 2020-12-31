<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\sub_materials;

use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::all();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $product_code = Products::where('code', '=', $request->input('code'))->first();
        $product_name = Products::where('name', '=', $request->input('name'))->first();
       
        if ($product_code === null && $product_name === null) {
                $product = Products::create
                ([
                'name' => $request->name,
                'code' => $request->code,
                'price' => $request->price, 
                'quantity' => $request->quantity,
                ]);
                $material = $request->submaterial;
                $blogmaterial = [];
                foreach($material as $m){
                array_push($blogmaterial,['submaterial'=>$m,'product_ref'=>$product->id]);
                }
                sub_materials::insert($blogmaterial);
                // log::info($blogmaterial);
        }else{
            return response()->jason('This code or product name already  exists');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $product = Products::find($id);

        return response()->json($product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        return response()->json($product);
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
        $product = Products::find($id);
        $product->name = $request->get('name');
        $product->code = $request->get('code');
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->update();
        return response()->json($product);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        $material = sub_materials::where('product_ref',$id);
        $material->delete();
        // log::info($material);
    }
}
    