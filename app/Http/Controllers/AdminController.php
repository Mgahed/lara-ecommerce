<?php

namespace App\Http\Controllers;

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
}
