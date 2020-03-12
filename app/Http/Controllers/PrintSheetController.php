<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrintSheetCollection;
use App\PrintSheet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrintSheetController extends Controller
{
    /* GET ALL */
    public function index()
    {
        return new PrintSheetCollection(PrintSheet::all());
    }

    /* VIEW SINGLE */
    public function view($id)
    {
        $get = PrintSheet::find($id);
        return response()->json($get);
    }

    /* NEW */
    public function store(Request $request)
    {
        $post = new PrintSheet([

            // ...
            
        ]);
        $post->save();
        return response()->json('successfully added');
    }

    /* EDIT */
    public function edit($id)
    {
        $post = PrintSheet::find($id);
        return response()->json($post);
    }

    /* UPDATE */
    public function update($id, Request $request)
    {
        $post = PrintSheet::find($id);
        $post->update($request->all());
        return response()->json('successfully updated');
    }

    /* DELETE */
    public function delete($id)
    {
        $post = PrintSheet::find($id);
        $post->delete();
        return response()->json('successfully deleted');
    }
}
