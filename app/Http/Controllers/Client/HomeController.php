<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    const PER_PAGE = 8;
    public function index()
    {
        $products = Product::paginate(self::PER_PAGE);
        return view('client.home.index', compact('products'));
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
