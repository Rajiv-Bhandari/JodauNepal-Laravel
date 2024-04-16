<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhaltiPayment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function khaltiPayment(Request $request)
    {
        $args = http_build_query(array(
            'token' => $request->token,
            'amount'  => 1000
          ));
          
          $url = "https://khalti.com/api/v2/payment/verify/";
          
          # Make the call using API.
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          
          $headers = ['Authorization: Key test_secret_key_552708bf69d24237a561bbca5e13bca3'];
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          
          // Response
          $response = curl_exec($ch);
          $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);

          if($status_code == 200)
          {
            return response()->json(['message' => 'Payment data stored successfully'], 200);
          }
          else
          {
            return response()->json([
                'message' => 'Payment failed!',
                'status_code' => $status_code,
                'response' => $response
            ], 400);    
          }
        // $validatedData = $request->validate([
        //     'amount' => 'required', 
        //     'idx' => 'required',
        //     'mobile' => 'required',
        //     'product_identity' => 'required',
        //     'product_name' => 'required',
        //     'product_url' => 'required',
        //     'token' => 'required',
        //     'widget_id' => 'required',
        // ]);

        // $payment = KhaltiPayment::create([
        //     'amount_in_paisa' => $validatedData['amount'],
        //     'idx' => $validatedData['idx'],
        //     'mobile' => $validatedData['mobile'],
        //     'product_identity' => $validatedData['product_identity'],
        //     'product_name' => $validatedData['product_name'],
        //     'product_url' => $validatedData['product_url'],
        //     'token' => $validatedData['token'],
        //     'widget_id' => $validatedData['widget_id'],
        //     'paid_by' => auth()->id(),
        //     'paid_to' => 1,
        // ]);

        // return response()->json(['message' => 'Payment data stored successfully'], 200);
    }
}
