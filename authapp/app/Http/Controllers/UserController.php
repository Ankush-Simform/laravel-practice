<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;

class UserController extends Controller
{
    protected $payment;

    public function __construct(PaymentGateway $payment)
    {
        $this->payment = $payment;
    }

    public function index()
    {
        return $this->payment->pay();
    }
}