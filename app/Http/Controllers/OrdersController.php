<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\orderdetails;
use App\Models\Menu;
use App\Models\User;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders-> Orders::all();
        return $orders;
    }
    
    public function getOrderDetails($order_id){
        $order = orders::find($order_id);
        //user 
        $order->user = User::find($order->user_id);
        //order details
        $order->order_details = orderdetails::where('order_id', $order->id)->get();
        //menu
        foreach ($order->order_details as $order_detail){
            $menu = menu::find($order_detail->menu_id);
            $order_detail->menu_name = $menu->name;
            $order_detail->menu_price = $menu->price;
        }
        return $order;
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
     * @param  \App\Http\Requests\StoreOrdersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdersRequest $request)
    {
        $orders =new Orders;//creates a new menu instantiate a row creating a new row the code below references the column
        $orders-> user_id = $request->user_id;
        $orders-> order_type =$request->order_type;
        $orders-> order_status =$request->order_status;
        $orders-> order_total=$request->order_total;
        $orders-> save();
        return $orders;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrdersRequest  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        $orders=Orders::find($request->id);
        $orders-> user_id = $request->user_id;
        $orders-> order_type =$request->order_type;
        $orders-> order_status =$request->order_status;
        $orders-> order_total=$request->order_total;
        $orders-> save();
        return $orders;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
