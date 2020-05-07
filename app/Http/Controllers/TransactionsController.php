<?php

namespace App\Http\Controllers;
use DB;
use App\Transactions;
use App\Purchased;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function customer()
    {
        //
        $agent = new Agent();
        return view('customer', compact('agent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function start(Request $request)
    {
        //
        $agent = new Agent();
        $products = DB::table('products')->get();
        $prodarray = [];
        foreach($products as $p){
            array_push($prodarray, array(
                'id' => $p->id,
                'name' => $p->product_name,
                'desc' => $p->description,
                'prize' => $p->product_prize,
            ));
        }
        $name = $request->input('name');
        $mobile = $request->input('mobile');
        $address = $request->input('address');
        $reference = $request->input('reference');
        $branch = json_decode($request->input('branch'), true);
        $cart = json_decode($request->input('cart'), true);

        $createTransaction = Transactions::create([
            'customer_name' => $name,
            'customer_mobile' => $mobile,
            'customer_address' => $address,
            'reference' => $reference,
            'branch_id' => $branch,
            'total_cost' => 0,
            'payment_status' => 0,
        ]);
        
        $transactionId = $createTransaction->id;

        $cartArray = [];
        $duePayment = 0;
        foreach($cart as $c){
            $itemId = $c['id'];
            $key = array_search($itemId, array_column($prodarray, 'id'));
            $duePayment += $prodarray[$key]['prize'] * $c['units'];
            array_push($cartArray, array(
                'transaction_id' => $transactionId,
                'product_id' => $c['id'],
                'product_name' => $c['name'],
                'single_cost' => $prodarray[$key]['prize'],
                'quantity' => $c['units'],
                'total_cost' => $prodarray[$key]['prize'] * $c['units'],
                'created_at' => DB::raw('now()'),
                'updated_at' => DB::raw('now()'),
            ));
        }
        $customer = array(
            'name' => $name,
            'mobile' => $mobile,
            'address' => $address,
            'branch' => $branch,
            'transaction' => $transactionId,
            'reference' => $reference,
            'duePayment' => $duePayment * 100,
        );
        $cart = $cartArray;
        $PurchasedItems = Purchased::insert($cartArray);
        $data = array(
            'customer' => $customer,
            'cart' => $cart,
        );

        if($PurchasedItems = true){
            return redirect()->action(
                'TransactionsController@confirm', ['data' => $data]
            );
        }else{
            emotify('error', 'Error updating product. Please try again later');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        //
        $agent = new Agent();
        $data = $request->input('data');
        return view('confirm', compact('agent'), ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transactions $transactions)
    {
        //
    }

}
