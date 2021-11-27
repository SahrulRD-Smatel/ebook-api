<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Http\Resources\AuthorResource;
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
        $data = Authors::get();
        return response([
            'status' => 200,
            'message' => 'data terload',
            'data' => $data,
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
    //id, name, date_of_birh, place_of_birth, gender, email, hp, create_at, update_at.
    {
        $data = Authors::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'hp' => $request->hp
        ]);
        return response([
            'status' => 200,
            'message' => 'Data successfully added',
            'data' => $data,
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
        $data = Authors::find($id);
        if ($data == null) {
            return response([
                'status' => 404,
                'message' => "Tidak ada data dengan id $id",
            ], 404);
        } else {
            return response([
                'status' => 200,
                'message' => 'Data terload',
                'data' => $data,
            ], 200);
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
        $data = Authors::find($id);
        if ($data == null) {
            return response([
                'status' => 404,
                'message' => "Tidak ada data dengan id $id",
            ], 404);
        } else {
            $data->update($request->all());
            return response(
                [
                    'message' => 'Update successfully',
                    'status' => 200,
                    'data' => new AuthorResource($data)
                ],
                200
            );
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
        $authors = Authors::find($id);
        if ($authors == null) {
            return response([
                'status' => 404,
                'message' => "Tidak ada data dengan id $id",
            ], 404);
        } else {
            $authors->delete();
            return response(
                [
                    'data' => new AuthorResource($authors),
                    'message' => 'Delete successfully',
                    'status' => 200
                ],
                200
            );
        }
    }
}