<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home.index');
    }

    public function contact()
    {
        return view('client.home.contact');
    }

    public function about()
    {
        return view('client.home.about');
    }
}
