<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        return response()->json([
            'status' => 200,
            'data' => $author
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
        $author = new Author();
        $author->name = $request->input('name');
        $author->date_of_birth = $request->input('date_of_birth');
        $author->place_of_birth = $request->input('place_of_birth');
        $author->gender = $request->input('gender');
        $author->email = $request->input('email');
        $author->hp = $request->input('hp');
        $author->save();

        return response()->json([
            'status' => 201,
            'data' => $author
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
        $author = Author::find($id);

        if($author){
            return response()->json([
                'status' => 200,
                'data' => $author
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Gagal menampilkan data, karena id ' . $id . ' tidak dapat ditemukan. Pastikan id dengan benar:)'
            ], 404);
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
        $author = Author::find($id);
        if($author){
            $author->name = $request->name ? $request->name : $author->name;
            $author->date_of_birth = $request->date_of_birth ? $request->date_of_birth : $author->date_of_birth;
            $author->place_of_birth = $request->place_of_birth ? $request->place_of_birth : $author->place_of_birth;
            $author->gender = $request->gender ? $request->gender : $author->gender;
            $author->email = $request->email ? $request->email : $author->email;
            $author->hp = $request->hp ? $request->hp : $author->hp;
            $author->save();

            return response()->json([
                'status' => 200,
                'data' => $author
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Gagal update data, karena id ' . $id . ' tidak ditemukan. Pastikan id dengan benar:)'
            ], 404);
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
        $author = Author::where("id", $id)->first();
        if($author){
            $author->delete();
            return response()->json([
                'status' => 200,
                'data' => $author
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Gagal menghapus data, karena id ' . $id . ' tidak ditemukan. Pastikan id dengan benar:)'
            ], 404);
        }
    }
}