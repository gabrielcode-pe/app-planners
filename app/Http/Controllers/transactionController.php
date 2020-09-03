<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Culqi\Culqi;
use Culqi\CulqiException;

class transactionController extends Controller
{
    public function __construct()
    {
        $this->culqi = new Culqi(['api_key' => config('services.culqi.secret_key')]);
    }


    public function showCheckoutForm(Type $var = null)
    {
        return view('checkout');
    }

    public function processCharge(Request $request)
    {
        dd($request->all());
    }
}
