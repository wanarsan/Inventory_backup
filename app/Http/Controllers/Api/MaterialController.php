<?php

namespace App\Http\Controllers\Api;
use App\Models\Materials;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $material = Materials::all();
        return response()->json($material);
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
        $material = Materials::where('code', '=', $request->input('code'))->first();
        if ($material === null) {
             Materials::create([
            'name' => request('name'),
            'code' => request('code'),
            'price' => request('price'),
            'description' => request('description'),
            'quantity' => request('quantity'),
            'supplier' => request('supplier'),
             ]);
            return response()->json('The post successfully added');
            }
            else
            {
                return response()->json('This code exist');
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
       $material = Materials::find($id);
        return response()->json($material);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Materials::find($id);
        return response()->json($material);
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
        $material = Materials::find($id);
        $material->name = $request->get('name');
        $material->code = $request->get('code');
        $material->price = $request->get('price');
        $material->quantity = $request->get('quantity');
        $material->description = $request->get('description');
        $material->supplier = $request->get('supplier');
        $material->update();
        return response()->json($material);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Materials::find($id);
        $material->delete();
        return response()->json($material);
    }
}
