<?php

namespace App\Models;

use App\Mail\OrderMail;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Session;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function division()
    {
        return $this->belongsTo(ShipDivision::class, 'division_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    /*----- other -----*/
    public function make_order($division_id, $district_id, $name, $email, $phone, $address, $notes, $shipping_cost, $payment_type, $payment_method, $total_amount, $transaction_id = null)
    {
//        $number = strtotime(Carbon::now()) . mt_rand(10000000, 99999999);
        $last_order = Order::orderBy('id', 'DESC')->first();
        if ($last_order) {
            $id = $last_order->id + 1;
        } else {
            $id = 1;
        }
        $number = str_pad($id, 9, "0", STR_PAD_LEFT);
        $order_id = Order::insertGetId([
            'user_id' => auth()->id(),
            'division_id' => $division_id,
            'district_id' => $district_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'notes' => $notes,

            'payment_type' => $payment_type,
            'payment_method' => $payment_method,

            'transaction_id' => $transaction_id,

            'amount' => $total_amount + $shipping_cost,

            'order_number' => $number,
            'invoice_number' => 'EOS' . $number,
            'status' => 'pending',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'qty' => $cart->qty,
                'price' => $cart->price,
            ]);
        }

        // Start Send Email
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'amount' => $total_amount + $shipping_cost,
            'amountbefore' => $total_amount,
            'cost' => $shipping_cost,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($email)->send(new OrderMail($data));

        // End Send Email


        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();
    }
}
