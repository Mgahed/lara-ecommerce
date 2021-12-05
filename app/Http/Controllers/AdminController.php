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
        $this_month = Order::whereMonth('created_at', Carbon::now()->month)->sum('amount');
        $last_month = Order::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('amount');
        $two_month = Order::whereMonth('created_at', Carbon::now()->subMonths(2)->month)->sum('amount');

        return view('admin.index',compact('this_month','last_month','two_month'));
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
