<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
       $book = Book::all(); 

       return response()->json($book);
 
    }
    public function create(Request $request){
         $request->validate([
            
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'date_of_issue' => 'required'

        ]);

        Book::create($request->all());
        $data = Book::all()->last();
        return Response::json([   
            'status' => 'created', 
            $data 
        ]); 
    }
    public function update(Request $request, Book $book, $id){ 
        $request->validate([
            
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'date_of_issue' => 'required'

        ]);
        $book = Book::find($id);
        $book->update($request->all());
        $data = Book::latest('updated_at')->first();
        return Response::json([ 
            'status' => 'Data Edited Successfully',
            $data

        ]); 
    }
    public function delete(Book $book, $id){
        $book = Book::find($id);
        $book->delete();
        return Response::json([ 
            'status' => 'data deleted'
        ]); 
    }
}