<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Materials;
use App\Models\sub_materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

use function PHPUnit\Framework\isEmpty;

class SubmaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
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

       $check = sub_materials::where('submaterial','=', $request->input('contents_adds'))->where('product_ref','=', $request->id)->first();

       if($check === null){
               

                $material = $request->contents_adds;
                $blogmaterial = []; 
                foreach($material as $m){
                array_push($blogmaterial,['submaterial'=>$m,'product_ref'=>$request->id]);
                }
                sub_materials::insert($blogmaterial);
               
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_ref)
    {
        // $material = sub_materials::Where('product_ref',$product_ref);

        $material = sub_materials::where('product_ref', $product_ref)->get();
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
        
      $material = sub_materials::where('product_ref',$id)->get('submaterial'); 
       $sub = Materials::select('name')->whereNotIn('name',$material)->get(); 
      
        return response()->json($sub);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($contents)
    {   
        $submaterial=sub_materials::where('id',$contents)->delete();
      
    }
}
