<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    //will show dashboard page for customers
    public function index (){
        return view('dashboard');
    }
}
