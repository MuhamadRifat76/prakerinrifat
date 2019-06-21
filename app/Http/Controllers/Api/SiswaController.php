<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $siswa = siswa::all();
     if (!$siswa){
         $response =[
             'success'=>false,
             'data'=>'Empety',
             'message'=>'siswa tidak ditemukan'
         ];
         return response()->json($response,404);

     }
     $response =[
         'success'=>true,
         'data'=>$siswa,
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
        $siswa = Siswa::create($input);

        //5.menampilkan response
        $response =[
            'success' => true,
            'data'=>$siswa,
            'message'=> 'Siswa berhasil ditambahkan'
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
       $siswa = siswa::Find($id);
     if (!$siswa){
         $response =[
             'success'=>false,
             'data'=>'Empety',
             'message'=>'siswa tidak ditemukan'
         ];
         return response()->json($response,404);

     }
     $response =[
         'success'=>true,
         'data'=>$siswa,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
