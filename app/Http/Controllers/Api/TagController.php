<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $tag = Tag::all();
     if (count($tag)<=0){
         $response =[
             'success'=>false,
             'data'=>'Empety',
             'message'=>'tag tidak ditemukan'
         ];
         return response()->json($response,404);

     }
     $response =[
         'success'=>true,
         'data'=>$tag,
         'message'=>'berhasil'
     ];
     return response()->json($response,200);
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
        //1.tampung semua inputan ke$input;
        $input = $request->all();

        //2.buat validasi ditampung ke $validator
        $validator = Validator::make($input,[
            'nama'=> 'required|min::15'
        ]);
        //3.chek validasi
        if ($validator->fails()){
            $response =[
                'success'=> false,
                'data'=> 'validation error',
                'message'=> $validator->errors()
            ];
            return response()->json($response,500);
        }
        //4.buat fungsi untuk menghandle semua inputan->
        // dimasukan ke table
        $tag = Tag::create($input);

        //5.menampilkan response
        $response =[
            'success' => true,
            'data'=>$tag,
            'message'=> 'tag berhasil ditambahkan'
        ];
        //6.tampilan hasil
        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $tag = Tag::Find($id);
     if (!$tag){
         $response =[
             'success'=>false,
             'data'=>'Empety',
             'message'=>'tag tidak ditemukan'
         ];
         return response()->json($response,404);

     }
     $response =[
         'success'=>true,
         'data'=>$tag,
         'message'=>'berhasil'
     ];
     return response()->json($response,200);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $tag = Tag::find($id);
        $input = $request->all();

        if (!$tag){
            $response = [
                'success'=> false,
                'data'=>'Empty',
                'message'=>'tag tidak ditemukan'
            ];
            return response()->json($response,404);
        }
        $validator = Validator::make ($input,[
            'nama' => 'required|min:15'
        ]);
        if ($validator->fails()){
            $response = [
                'success' => false,
                'data' => 'validation error',
                'message'=> $validator->errors()
        ];
   
            return response()->json($response,500);
       }      
       
        $tag->nama = $input['nama'];
        $tag->save();

        $response = [
             'success'=> true,
                'data'=>'$tag',
                'message'=>'tag berhasil di update'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (!$tag){
            $response = [
                'success' => false,
                'data' => 'gagal update',
                'message'=> 'tag tidak ditemukan'
            ];
            return response()->json($response,404);
        }
        $tag->delete();
        $response = [
            'success' => true,
            'data' =>$tag,
            'message'=>'tag berhasil dihapus'
        ];
    }
}


