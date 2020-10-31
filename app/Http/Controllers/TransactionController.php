<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Culqi\Culqi;
use Culqi\CulqiException;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->culqi = new Culqi(['api_key' => config('services.culqi.secret_key')]);
    }


    public function showCheckoutForm(Type $var = null)
    {
        return view('checkout');
    }

    public function processCharge(Request $request, $tokenId)
    {
        $paymentAmount = intval(floatval($request->payment_amount) * 100);

        try {
            
            $charge = $this->culqi->Charges->create([
                'amount' => $paymentAmount,
                'currency_code' => 'PEN',
                'description' => 'Compra de curso - Escuela de proyectistas',
                'email' => $request->email,
                'source_id' => $tokenId,
                'antifraud_details' => [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address_city,
                    'phone_number' => $request->phone_number
                ]

            ]);


            $courses = $request->courses;
            $merchantMessage = $charge->outcome->merchant_message;
            $referenceCode = $charge->reference_code;
            $authorizationCode = $charge->authorization_code;

            //Examples result
            // "reference_code": "AIaAHCn3rw"
            // "authorization_code": "CXGA9M"


            // TODO: send mail here

            return response()->json(['type' => $charge->outcome->type , 'message' => $charge->outcome->user_message], 200);

        } catch (\Exception $e) {

            $error = json_decode($e->getMessage());
            
            return response()->json(['type' => $error->type ,'message' => $error->user_message], 400);
        }
        
    }
}
