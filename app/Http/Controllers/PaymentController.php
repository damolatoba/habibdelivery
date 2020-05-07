<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Transactions;
use Jenssegers\Agent\Agent;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return $response = Paystack::getAuthorizationUrl()->redirectNow();
        // dd($response);
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $agent = new Agent();

        if($paymentDetails['status'] == 'true'){
            $reference = $paymentDetails['data']['reference'];

            Transactions::where('reference', $reference)
            ->update(['payment_status' => 1, 'total_cost' => $paymentDetails['data']['amount']/100]);
            // dd($reference);
            // dd($paymentDetails);
            return view('thankyou', compact('agent'), ['data' => $paymentDetails['data']]);
        }
    }
}