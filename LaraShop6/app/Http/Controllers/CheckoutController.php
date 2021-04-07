<?php

namespace App\Http\Controllers;
use DateTime;
use App\Order;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        if(Cart::count() <= 0) {
            return redirect()->route('shop');
        }

        Stripe::setApiKey('sk_test_51Ia0u4BhbfReWz8ori66hDMFbrxQhwifjMhAZslyalzCz0SwKHHAcadlFCabe9wDt07Gd1rbaSsWNtmgcqDtck0A00CZVKfyyW');
        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'eur',
            'payment_method_types' => ['card'],
        ]);
        
        $clientSecret = Arr::get($intent, 'client_secret');
        
        return view('checkout.index', [
            "clientSecret" => $clientSecret,
        ]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->json()->all();
        $order = new Order();
        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];
        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');


        $products = [];
        $i = 0;
        foreach(Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }
        
        $order->products = serialize($products);
        $order->user_id = 15;
        $order->save();
        

        if($data['paymentIntent']['status'] === 'succeeded') {
            Cart::destroy();
            Session::flash('success', 'Votre commande à été traitée avec succés');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Failed']);
        }
        
    }


    public function thankyou() {
        return Session::has('success') ? view('checkout.thankyou') : redirect()->route('shop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
