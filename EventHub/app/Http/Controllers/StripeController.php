<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeController extends Controller
{

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $userEmail = auth()->user()->email ?? null;
        //dd($request);

        $eventId = $request->get('eventId');
        $eventName = $request->get('eventName');
        $ticketQuantity = $request->get('quantity');
        $eventPrice = $request->get('eventPrice');
        $totalPrice = $eventPrice;
        $total = $totalPrice * 100;

        // Log user's email
        //Log::info('userEmail: ' . $userEmail);

        // Create a session with metadata including the user's email
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'MYR',
                        'product_data' => [
                            "name" => $eventName,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => $ticketQuantity,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success', [
                'eventName' => $eventName,
                'quantity' => $ticketQuantity,
                'eventPrice' => $eventPrice
            ]),
            'cancel_url' => route('events.show', ['events' => $eventId]),
            'payment_intent_data' => [
                'receipt_email' => $userEmail, // Specify the email address for receipt
                'metadata' => [
                    'event_id' => $eventId,
                    'quantity' => $ticketQuantity,
                ],
            ],
        ]);

        // Redirect the user to the session URL
        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        //dd($request);
        // Retrieve data from the request body
        $userEmail = auth()->user()->email ?? $request->input('email');
        $eventName = $request->input('eventName');
        $quantity = $request->input('quantity');
        $eventPrice = $request->input('eventPrice');
    
        // Return the view with the retrieved data
        return view('stripe.success', compact('userEmail', 'eventName', 'quantity', 'eventPrice'));
    }

    public function webhook(Request $request)
    {
        // Log the incoming webhook payload
        //Log::info('Webhook payload: ' . $request->getContent());
    
        $payload = json_decode($request->getContent(), true);
        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = 'whsec_aNN8TaCbsn1DDjQNPcno0XTjaf3zagaq'; // Replace with your actual webhook secret
    
        try {
            $event = Webhook::constructEvent($request->getContent(), $sig_header, $endpoint_secret);
        } catch (SignatureVerificationException $e) {
            // Invalid signature
            return response('Invalid signature', 400);
        }
    
        $paymentData = $event['data']['object'];
    
        // Assuming the payment data contains 'id', 'amount', 'currency', and 'status' fields
        $stripeId = $paymentData['id'] ?? null;
        $amount = $paymentData['amount'] ?? null;
        $currency = $paymentData['currency'] ?? null;
        $status = $paymentData['status'] ?? null;
        $userEmail = $paymentData['receipt_email'] ?? null;
    
        // Retrieve metadata from payment intent object
        $metadata = $paymentData['metadata'] ?? [];
        $eventId = $metadata['event_id'] ?? null;
        $ticketQuantity = $metadata['quantity'] ?? null;
    
        // Get real amount
        $realamount = $amount * 0.01;
    
        // Insert the data into the payments table
        $payment = new Payment();
        $payment->stripe_id = $stripeId;
        $payment->email = $userEmail;
        $payment->event_id = $eventId;
        $payment->ticket_quantity = $ticketQuantity;
        $payment->amount = $realamount;
        $payment->currency = $currency;
        $payment->status = $status;
        $payment->save();
    
        // Optionally, you can return a response
        return response()->json(['message' => 'Payment data received and saved successfully']);
    }
    
}
