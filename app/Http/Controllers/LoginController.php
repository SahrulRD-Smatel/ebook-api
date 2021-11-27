<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Auth; 

class LoginController extends Controller
{
    //
    public function store(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        $status = 401;
        $response = [
            'error' => 'Proses masuk gagal!. Silahkan coba kembali.', 
        ]; 
         
        if (Auth::attempt($credentials)) {
            $status = 200;
            $token = $request->user()->createToken('access_token')->plainTextToken; 
            $response = [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ];
        } 
         
        return response()->json($response, $status);
    } 
}
