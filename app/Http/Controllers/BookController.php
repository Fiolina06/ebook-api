<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book1 = book::all();
        return response()->json([
            "message" => "Load data succes",
            "data" => $book1
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
        $book1 = Book::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "publisher" => $request->publisher,
            "date_of_issue" => $request->date_of_issue,
        ]);

        //return $book1;
        return response()->json([
            "message" => "store succes",
            "data" => $book1
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book1 = Book::find($id);
        if($book1){
            return $book1;
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
        $book1 = Book::find($id);
        if($book1){
            $book1->title = $request->title ? $request->title : $book1->title;
            $book1->description = $request->description ? $request->description : $book1->description;
            $book1->author = $request->author ? $request->author : $book1->author;
            $book1->publisher = $request->publisher? $request->publisher : $book1->publisher;
            $book1->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $book1->date_of_issue;
            $book1->save();

            return $book1;
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
        $book1 = Book::find($id);
        if($book1){
            $book1->delete();
            return ["message" => "Delete succes"];
    }else{
        return ["message" => "Data not found"];
    }
    }
}