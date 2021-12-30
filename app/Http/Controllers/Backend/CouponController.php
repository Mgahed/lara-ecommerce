<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\PriceCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    protected function getRules()
    {
        return [
            'name' => 'required',
            'discount' => 'required|numeric',
            'validity' => 'required',
        ];
    }

    protected function getMSG()
    {
        return [
            'name.required' => __('This field is required'),
            'discount.required' => __('This field is required'),
            'discount.numeric' => __('Must be a number'),
            'validity.required' => __('This field is required'),
        ];
    }

    public function CouponView()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('admin.coupon.view_coupon', compact('coupons'));
    }


    public function CouponStore(Request $request)
    {

        $rules = $this->getRules();
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        Coupon::create([
            'name' => strtoupper($request->name),
            'discount' => $request->discount,
            'validity' => $request->validity
        ]);

        $notification = array(
            'message' => __('Coupon Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method


    public function CouponEdit($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('admin.coupon.edit_coupon', compact('coupons'));
    }


    public function CouponUpdate(Request $request, $id)
    {

        Coupon::findOrFail($id)->update([
            'name' => strtoupper($request->name),
            'discount' => $request->discount,
            'validity' => $request->validity
        ]);

        $notification = array(
            'message' => __('Coupon Updated Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('manage-coupon')->with($notification);


    } // end mehtod


    public function CouponDelete($id)
    {

        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => __('Coupon Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    /*----- price coupon -----*/

    public function PriceCouponView()
    {
        $coupons = PriceCoupon::orderBy('id', 'DESC')->get();
        return view('admin.coupon_price.view_coupon', compact('coupons'));
    }


    public function PriceCouponStore(Request $request)
    {

        $rules = $this->getRules();
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        PriceCoupon::create([
            'name' => strtoupper($request->name),
            'discount' => $request->discount,
            'validity' => $request->validity
        ]);

        $notification = array(
            'message' => __('Coupon Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method


    public function PriceCouponEdit($id)
    {
        $coupons = PriceCoupon::findOrFail($id);
        return view('admin.coupon_price.edit_coupon', compact('coupons'));
    }


    public function PriceCouponUpdate(Request $request, $id)
    {

        PriceCoupon::findOrFail($id)->update([
            'name' => strtoupper($request->name),
            'discount' => $request->discount,
            'validity' => $request->validity
        ]);

        $notification = array(
            'message' => __('Coupon Updated Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('price.manage-coupon')->with($notification);


    } // end mehtod


    public function PriceCouponDelete($id)
    {

        PriceCoupon::findOrFail($id)->delete();
        $notification = array(
            'message' => __('Coupon Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

}
