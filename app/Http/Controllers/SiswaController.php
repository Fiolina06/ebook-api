<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa1 = Siswa::all();
        return response()->json([
            "message" => "Load data succes",
            "data" => $siswa1
        ], 200);
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

        $table = Siswa::create([
            "name" => $request->name,
            "gender" => $request->gender,
            "age" => $request->age,
        ]);
        
        return response()->json([
            "message" => "Store success",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa1 = Siswa::find($id);
        if($siswa1){
            return $siswa1;
        }else{
            return["message" => "Data not found"];
        }
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
        $siswa1 = Siswa::find($id);
        if($siswa1){
            $siswa1->name = $request->name ? $request-> name: $siswa1->name;
            $siswa1->gender = $request->gender ? $request->gender : $siswa1->gender;
            $siswa1->age = $request->age ? $request->age : $siswa1->age;
            $siswa1->save();

            return $siswa1;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa1 = Siswa::find($id);
        if($siswa1){
            $siswa1->delete();
            return ["message" => "Delete succes"];
    }else{
        return ["message" => "Data not found"];
    }
    }
}