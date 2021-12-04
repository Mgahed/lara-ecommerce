<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        /*$notification = [
            'message' => 'blablabla',
            'alert-type' => 'success'
        ];*/
        return view('admin.index');
    }

    public function AllUsers(){
        $users = User::latest()->get();
        return view('admin.user.all_user',compact('users'));
    }
}
