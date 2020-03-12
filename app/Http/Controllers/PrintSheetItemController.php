<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrintSheetItemCollection;
use App\PrintSheetItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PrintSheetItemController extends Controller
{
     /* GET ALL */
     public function index()
     {
         return new PrintSheetItemCollection(PrintSheetItem::all());
     }
 
     /* VIEW SINGLE */
     public function view($id)
     {
         $get = PrintSheetItem::find($id);
         return response()->json($get);
     }
 
     /* NEW */
     public function store(Request $request)
     {
         $post = new PrintSheetItem([
 
             // ...
             
         ]);
         $post->save();
         return response()->json('successfully added');
     }
 
     /* EDIT */
     public function edit($id)
     {
         $post = PrintSheetItem::find($id);
         return response()->json($post);
     }
 
     /* UPDATE */
     public function update($id, Request $request)
     {
         $post = PrintSheetItem::find($id);
         $post->update($request->all());
         return response()->json('successfully updated');
     }
 
     /* DELETE */
     public function delete($id)
     {
         $post = PrintSheetItem::find($id);
         $post->delete();
         return response()->json('successfully deleted');
     }
}
