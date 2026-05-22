<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function store(Request $request)
    {

        $request->validate([


            'name' => 'required|min:3',
            
            'email' => 'required_without:phone|nullable|email',

            'phone' => 'required_without:email|nullable|min:10',

            'payment_method' => 'required',

            'card_number' => 'required_if:payment_method,card',

            'cvv' => 'required_with:card_number',

            'upi_id' => 'required_if:payment_method,upi',

            'company_name' =>
            'required_if:is_company,1',

            'gst_number' =>
            'required_with:company_name',

            'address' =>
            'required_with_all:city,state',

            'city' => 'nullable',

            'state' => 'nullable',

        ]);

        Payment::create([

            'user_id' => auth()->id(),

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'payment_method' => $request->payment_method,

            'card_number' => $request->card_number,

            'cvv' => $request->cvv,

            'upi_id' => $request->upi_id,

            'is_company' => $request->is_company
                ? true
                : false,

            'company_name' => $request->company_name,

            'gst_number' => $request->gst_number,

            'address' => $request->address,

            'city' => $request->city,

            'state' => $request->state,

            'coupon' => $request->coupon

        ]);

        return "Payment Stored Successfully";
    }
}
