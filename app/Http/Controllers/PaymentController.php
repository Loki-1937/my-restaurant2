<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\User;
use App\Http\Requests\StorepaymentRequest;
use App\Notifications\SendPaymentEmail;
use App\Http\Requests\UpdatepaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment-> Payment::all();
        return $payment;
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
     * @param  \App\Http\Requests\StorepaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepaymentRequest $request)
    {
        $payment =new Payment;//creates a new menu instantiate a row creating a new row the code below references the column
        $payment-> order_id = $request->order_id;
        $payment-> payment_type =$request->payment_type;
        $payment-> amount =$request->amount;
        $payment-> user_id = $request->user_id;
        $payment-> payment_status =$request->payment_status;
        $user = User::find($request->user_id); ///get user by user_id
        $user->notify(new SendPaymentEmail($user, $payment));
        $payment-> save();
        return $payment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaymentRequest  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepaymentRequest $request, payment $payment)
    {
        $payment= Payment::find($request->id);
        $payment-> order_id = $request->order_id;
        $payment-> payment_type =$request->payment_type;
        $payment-> amount =$request->amount;
        $payment-> user_id = $request->user_id;
        $payment-> payment_status =$request->payment_status;
        $payment-> save();
        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        //
    }
}
