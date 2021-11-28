<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        /*return $request;*/
        /*if (Session::has('coupon')) {
            Session::forget('coupon');
        }*/

        $product = Product::findOrFail($id);


        Cart::add([
            'id' => $id,
            'name' => $request->name,
            'qty' => $request->quantity,
            'price' => $request->price,
            'weight' => 1,
            'options' => [
                'product_id' => $id,
                'image' => $product->thumbnail,
                'color' => $request->color,
            ],
        ]);
        if ($request->lang === 'en') {
            $message = 'Successfully Added on Your Cart';
        } else {
            $message = 'تم الاضافه الى السلة';
        }
        return response()->json(['success' => $message]);


    } // end mehtod


    // Mini Cart Section
    public function AddMiniCart()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));
    } // end method


/// remove mini cart
    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => __('Product Removed from Cart'),
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    } // end mehtod

    public function RemoveAll()
    {
        /*return "dasdas";*/
        $carts = Cart::content();
        foreach ($carts as $cart) {
            Cart::remove($cart->rowId);
        }
        return redirect()->json(['success' => 'All Products Removed from Cart']);
    }


    // add to wishlist mehtod

    public function AddToWishlist(Request $request, $product_id)
    {

        if (Auth::check()) {

            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);

            } else {

                return response()->json(['error' => 'This Product has Already on Your Wishlist']);

            }

        } else {

            return response()->json(['error' => 'At First Login Your Account']);

        }

    } // end method


    public function CouponApply(Request $request)
    {

        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));

        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }

    } // end method


    public function CouponCalculation()
    {

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
    } // end method


    // Remove Coupon
    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }


    // Checkout Method
    public function CheckoutCreate()
    {

        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'divisions'));

            } else {

                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);

            }


        } else {

            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);

        }

    } // end method
}
