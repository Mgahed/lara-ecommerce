<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Seo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        /*$notification = [
            'message' => 'blablabla',
            'alert-type' => 'success'
        ];*/
        /*return Carbon::now()->subMonth()->month;*/
        $this_month = Order::whereMonth('updated_at', Carbon::now()->month)->where('status', 'delivered')->sum('amount');
        $last_month = Order::whereMonth('updated_at', Carbon::now()->subMonth()->month)->where('status', 'delivered')->sum('amount');
        $two_month = Order::whereMonth('updated_at', Carbon::now()->subMonths(2)->month)->where('status', 'delivered')->sum('amount');

        $this_month_orders = Order::whereMonth('updated_at', Carbon::now()->month)->where('status', 'delivered')->count();
        $last_month_orders = Order::whereMonth('updated_at', Carbon::now()->subMonth()->month)->where('status', 'delivered')->count();
        $two_month_orders = Order::whereMonth('updated_at', Carbon::now()->subMonths(2)->month)->where('status', 'delivered')->count();
        return view('admin.index', compact('this_month', 'last_month', 'two_month', 'this_month_orders', 'last_month_orders', 'two_month_orders'));
    }

    public function AllUsers()
    {
        $users = User::latest()->get();
        return view('admin.user.all_user', compact('users'));
    }

    public function SetAdmin($id)
    {
        User::findOrFail($id)->update([
            'role' => 'admin'
        ]);
        $notification = [
            'message' => __('User role changed to admin'),
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function SetNormal($id)
    {
        User::findOrFail($id)->update([
            'role' => 'normal'
        ]);
        $notification = [
            'message' => __('User role changed to normal'),
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function SetMarketing($id)
    {
        User::findOrFail($id)->update([
            'role' => 'marketing'
        ]);
        $notification = [
            'message' => __('User role changed to marketing'),
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function SetFinancial($id)
    {
        User::findOrFail($id)->update([
            'role' => 'financial'
        ]);
        $notification = [
            'message' => __('User role changed to financial'),
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function SetShipping($id)
    {
        User::findOrFail($id)->update([
            'role' => 'shipping'
        ]);
        $notification = [
            'message' => __('User role changed to shipping'),
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function SeoSetting()
    {

        $seo = Seo::find(1);
        return view('admin.setting.seo_update', compact('seo'));
    }


    public function SeoSettingUpdate(Request $request)
    {

        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_tag' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,

        ]);

        $notification = array(
            'message' => __('Seo Updated Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end mehtod
}
