<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function khaltiPayment(Request $request)
    {
        print('Inside khaltiPayment method');
        dd($request->all());
    }
}
