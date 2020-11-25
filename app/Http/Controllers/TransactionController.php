<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Culqi\Culqi;
use Culqi\CulqiException;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmTransactionOwner;
use App\Mail\ConfirmTransactionClient;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->culqi = new Culqi(['api_key' => config('services.culqi.secret_key')]);
    }


    public function showCheckoutForm()
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


            $data = [
                'first_name' =>  $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'address' => $request->address_city,
                'amout' => $request->payment_amount,
                'courses' => $request->courses,
                'merchant_message' => $charge->outcome->merchant_message,
                'reference_code' => $charge->reference_code,
                'authorization_code' => $charge->authorization_code,
                'user_message' => $charge->outcome->user_message
            ];


            // Send mail to client
            Mail::to($data['email'])->send(new ConfirmTransactionClient($data));
            //Send mail to owner
            Mail::to('info@escueladeproyectistas.com')
            ->send(new ConfirmTransactionOwner($data));


            return response()->json(['type' => $charge->outcome->type , 'message' => $charge->outcome->user_message], 200);

        } catch (\Exception $e) {

            $error = json_decode($e->getMessage());
            
            return response()->json(['type' => $error->type ,'message' => $error->user_message], 400);
        }
        
    }
}
