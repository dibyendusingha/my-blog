<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use Session;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function payment_page(){
        return view('admin.payment');
    }

    public function add_payment(Request $request){
        $validator = Validator::make($request->all(), [
            'payment_amount' => 'required'
        ]);

        if ($validator->fails()) {
            $output['response']=false;
            $output['message']='Validation error!';
            $output['error'] = $validator->errors();
            return $output;
            exit;
        }else{

            try{
                DB::beginTransaction();
                $addUser = new Payment;
                $addUser->payment_amount   = $request->payment_amount;
                $addUser->order_id         = $request->order_id;
                $addUser->transaction_id   = $request->transaction_id;
                $addUser->save();
                DB::commit();
    
                return redirect('payment-page')->with(['success' =>'payment successfully.']);
    
            }catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'with' => 'error',
                    'message' => 'Error creating . ' . $e->getMessage(),
                ]);
            } 

        }
    }


    public function store(Request $request) {
      //  dd($request['payment_amount']);
        $input = $request->all();
       
        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                // $payment = Payment::create([
                //     'r_payment_id' => $response['id'],
                //     'method' => $response['method'],
                //     'currency' => $response['currency'],
                //     'user_email' => $response['email'],
                //     'amount' => $response['amount']/100,
                //     'json_response' => json_encode((array)$response)
                // ]);

                DB::beginTransaction();
                $addPayment = new Payment;
                $addPayment->r_payment_id     = $response['id'];
                $addPayment->method           = $response['method'];
                $addPayment->currency         = $response['currency'];
                $addPayment->user_email       = $response['email'];
                $addPayment->amount           = $response['amount']/100;
                $addPayment->json_response    = json_encode((array)$response);
                
                $addPayment->save();
                DB::commit();
    
                return redirect('home')->with(['success' =>'payment successfully.']);
            } catch(\Exception $e) {
                //return $e->getMessage();
                return redirect('home')->with(['error' =>$e->getMessage()]);
              
            }
        }
        
    }
}
