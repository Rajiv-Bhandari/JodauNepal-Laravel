<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhaltiPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function khaltiPayment(Request $request)
    {
        $args = http_build_query(array(
            'token' =>$request->payload['token'],
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
            $payload = $request->payload;
            $technicianId = $request->technician_id;
            $bookingId = $request->booking_id;

            $validator = Validator::make($payload, [
                'amount' => 'required', 
                'idx' => 'required',
                'mobile' => 'required',
                'product_identity' => 'required',
                'product_name' => 'required',
                'product_url' => 'required',
                'token' => 'required',
                'widget_id' => 'required',
            ]);
        
            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
            }
        
            $payment = KhaltiPayment::create([
                'amount_in_paisa' => $payload['amount'],
                'idx' => $payload['idx'],
                'mobile' => $payload['mobile'],
                'product_identity' => $payload['product_identity'],
                'product_name' => $payload['product_name'],
                'product_url' => $payload['product_url'],
                'token' => $payload['token'],
                'widget_id' => $payload['widget_id'],
                'paid_by' => auth()->id(),
                'paid_to' => $technicianId,
            ]);

            return response()->json(['message' => 'Payment verified and stored successfully'], 200);
          }
          else
          {
            return response()->json([
                'message' => 'Payment failed!',
                'status_code' => $status_code,
                'response' => $response
            ], 400);    
          }


        // return response()->json(['message' => 'Payment data stored successfully'], 200);
    }
}
