<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class CashController extends Controller
{
    public function CashOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        $order = new Order();

        $order->make_order($request->division_id, $request->district_id, $request->name, $request->email, $request->phone, $request->address, $request->notes, $request->shipping_cost, 'cash', 'cash', $total_amount);

        $notification = array(
            'message' => __('Your Order Place Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('home')->with($notification);


    } // end method
}
