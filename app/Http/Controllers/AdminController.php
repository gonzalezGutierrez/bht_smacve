<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.status.user');
        $this->middleware('isAdmin');
    }

    public function index(){
        return view('admin.admin');
    }
}
