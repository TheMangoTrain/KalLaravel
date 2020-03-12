<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    /* GET ALL */
    public function index() {
       return new OrderCollection(Order::all());
    }

    /* VIEW SINGLE */
    public function view($id) {
        $get = Order::find($id);
        return response()->json($get);
    }

    /* NEW */
    public function store(Request $request) {
        $post = new Order([
        /*  'sku' => $request->get('sku'),
            'title' => $request->get('title'),
            'size' => $request->get('size'),
            'price' => $request->get('price'),
            'inventory' => $request->get('inventory'), */
        ]);
        $post->save();
        return response()->json('successfully added');
    }

    /* EDIT */
    public function edit($id) {
        $post = Order::find($id);
        return response()->json($post);
    }

    /* UPDATE */
    public function update($id, Request $request) {
        $post = Order::find($id);
        $post->update($request->all());
        return response()->json('successfully updated');
    }
    
    /* DELETE */
    public function delete($id) {
        $post = Order::find($id);
        $post->delete();
        return response()->json('successfully deleted');
    }
}
