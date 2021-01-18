<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories=Category::all();

        return view('pages.checkout', [
            'categories'=>$categories]);
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
     

  $url = "https://api.paystack.co/transaction/initialize";

  $fields = [

    'email' => auth()->user()->email,

    'amount' => Cart::total() * 100,

    

  ];

  $fields_string = http_build_query($fields);

  //open connection

  $ch = curl_init();

  

  //set the url, number of POST vars, POST data

  curl_setopt($ch,CURLOPT_URL, $url);

  curl_setopt($ch,CURLOPT_POST, true);

  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //remedyplus keys
    //pk_live_e822b5f82c096f9f7df2f1bad888d8067a994788
    //sk_live_c797fd2306bd3311a90a8b584665449c8620654e

    //my test key   sk_test_8cb0e758304ba077174e8dfe52ef9706d87efe82

    "Authorization: Bearer sk_test_8cb0e758304ba077174e8dfe52ef9706d87efe82",

    "Cache-Control: no-cache",

  ));
 

  //So that curl_exec returns the contents of the cURL; rather than echoing it

  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

  //execute post
  $result = curl_exec($ch);
  echo $result;

  $res = json_decode($result);

  if($res->status == 'true'){
    $link=$res->data->authorization_url;
    //$request->user_id = auth()->user()->id; //assigning user_id value to the current logged in user's id (this has to be before adding the request to the inputs variable so when  you execute ::Create($inputs) it will be there)
    foreach (Cart::content() as $item){
      $request->product_id = $item->model->id;
          }
          $request->user_id = auth()->user()->id;
   // dd( $request->product_id = $item->model->id);
    $inputs = $request->all();
   // dd($inputs,$request->product_id, $request->user_id);
    //
    $amount=Cart::count();
  $orders = Order::Create($inputs,$request->product_id, $request->user_id,$amount);

          foreach(Cart::content() as $item){
              OrderProduct::create([
                'order_id'=>$orders->id,
                'product_id'=>$item->model->id,
                'quantity'=>$item->qty,
              ]);
          }
          
    return redirect($link);

  }
  else{
    return redirect()->route('checkout')->with('success_message', 'No items given');
  }


      /*  $request= [
            'tx_ref' =>time(),
            'amount' => Cart::total(),
            'currency'=>'NGN',
            'redirect_url'=>route('thankyou'),
            'payments_options'=>'card',
            'customer'=>[
              'email'=> auth()->user()->email,
              'name'=> auth()->user()->name,
                     ],
            ' customizations,'=>[
          'title'=> "Remedy plus",
          'description'=> "Payment for items in cart",
          'logo' => asset('img/logo.png'),
            ],
            'meta'=>[
              'price'=> Cart::total(),
               'email'=> auth()->user()->email
            ],
          ];
  
          $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/123456/verify",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json",
      "Authorization: Bearer FLWSECK_TEST-1090b4e5393b92f0887e4ff3b7978a94-X"
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
 
  echo $response;
  */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       
      
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
        
    }
}
