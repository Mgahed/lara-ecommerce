<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

class PaymobController extends Controller
{
    private function auth_request($client)
    {
        $response = $client->request('POST', 'https://accept.paymob.com/api/auth/tokens',
            [
                'json' => [
                    'api_key' => env('PAYMOB_TEST_KEY')
                ]
            ]);
        $token = json_decode($response->getBody()->getContents(), true)['token'];

        return $token;
    }

    private function order_register($client, $token, $amount_cents)
    {
        $response = $client->request('POST', 'https://accept.paymob.com/api/ecommerce/orders',
            [
                'json' => [
                    "auth_token" => $token,
                    "delivery_needed" => "false",
                    "amount_cents" => $amount_cents,
                    "currency" => "EGP",
                    "items" => [],
                ]
            ]);
        $order_id = json_decode($response->getBody()->getContents(), true)['id'];

        return $order_id;
    }

    public function card_order(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        Session::put('order_details', [
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'notes' => $request->notes,
            'shipping_cost' => $request->shipping_cost,
            'total_amount' => $total_amount,
        ]);

        $client = new Client();

        /*----- 1 -----*/
        $token = $this->auth_request($client);

        /*----- 2 -----*/
        $order_id = $this->order_register($client, $token, 100 * ($total_amount + $request->shipping_cost));


        /*----- 3 -----*/
        $response = $client->request('POST', 'https://accept.paymob.com/api/acceptance/payment_keys',
            [
                'json' => [
                    "auth_token" => $token,
                    "amount_cents" => 100 * ($total_amount + $request->shipping_cost),
                    "expiration" => 3600,
                    "order_id" => $order_id,
                    "billing_data" => [
                        "apartment" => "NA",
                        "email" => $request->email,
                        "floor" => "NA",
                        "first_name" => $request->name,
                        "street" => "NA",
                        "building" => "NA",
                        "phone_number" => "+2" . $request->phone,
                        "shipping_method" => "NA",
                        "postal_code" => "NA",
                        "city" => "NA",
                        "country" => "EG",
                        "last_name" => "-",
                        "state" => "NA"
                    ],
                    "currency" => "EGP",
                    "integration_id" => env('PAYMOB_CARD_INTEGRATION_ID')
                ]
            ]);

//        return json_decode($response->getBody()->getContents());
        $payment_token = json_decode($response->getBody()->getContents(), true)['token'];

        /*----- 4 mobile wallet -----*/
        /*$response = $client->request('POST', 'https://accept.paymob.com/api/acceptance/payments/pay',
            [
                'json' => [
                    "source" => [
                        "identifier" => "01010101010",
                        "subtype" => "WALLET"
                    ],
                    "payment_token"=> $payment_token
                ]
            ]);
        return json_decode($response->getBody()->getContents(), true);*/

//        return view('front.payment.card', compact('payment_token'));
        return \Redirect::away('https://accept.paymob.com/api/acceptance/iframes/' . env('PAYMOB_IFRAME_ID') . '?payment_token=' . $payment_token);
//        return \Redirect::away('https://portal.weaccept.co/api/acceptance/iframes/' . env('PAYMOB_IFRAME_ID') . '?payment_token=' . $payment_token);

        //$order = new Order();
        //return $request->toArray();
//        return array_merge($request->toArray(), ['total_amount' => $total_amount + $request->shipping_cost]);
    }

    public function paymob_card_callback_get(Request $request)
    {
        if (Session::has('order_details')) {
            $order_details = Session::get('order_details');
        }
        $data = $request->all();
        ksort($data);
//        return $data;
        $hmac = $data['hmac'];
        $array = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success',
        ];
        $connectedString = '';
        foreach ($data as $key => $element) {
            if (in_array($key, $array)) {
                $connectedString .= $element;
            }
        }
        $secret = env('PAYMOB_HMAC');
        $hased = hash_hmac('sha512', $connectedString, $secret);
        if ($hased == $hmac) {
            if ($data['success'] == 'true') {
                $order = new Order();
                $order->make_order($order_details['division_id'], $order_details['district_id'], $order_details['name'], $order_details['email'], $order_details['phone'], $order_details['address'], $order_details['notes'], $order_details['shipping_cost'], 'paymob', $data['source_data_sub_type'], $order_details['total_amount'], $data['order']);

                $notification = array(
                    'message' => __('Your Order Place Successfully'),
                    'alert-type' => 'success'
                );
                return redirect()->route('home')->with($notification);
            }
        }
        $notification = array(
            'message' => __('Error happened please try again or contact us'),
            'alert-type' => 'error'
        );
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        return redirect()->route('home')->with($notification);
    }

    public function paymob_card_callback_post(Request $request)
    {
        /*Order::create([
            'user_id' => auth()->id(),
            'division_id' => "klsdfsd",
            'district_id' => "klsdfsd",
            'name' => "klsdfsd",
            'email' => "klsdfsd",
            'phone' => "klsdfsd",
            'address' => "klsdfsd",
            'notes' => "klsdfsd",

            'payment_type' => "klsdfsd",
            'payment_method' => "klsdfsd",

            'amount' => 5 + 5,

            'order_number' => "43242",
            'invoice_number' => 'EOS' . "234234",
            'status' => 'pending',
        ]);*/
    }
}
