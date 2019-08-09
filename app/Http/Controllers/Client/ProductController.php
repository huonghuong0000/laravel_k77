<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    const  PER_PAGE = 6;

    public function shop(Request $request)
    {
        $condition = [];
        $start=null;
        $end=null;

        if($request->start)
        {
            $condition[] = ['price', '>=', $request->start];
            $start = (int)$request->start;
        }
        if($request->end)
        {
            $condition[] = ['price', '<=', $request->end];
            $end = (int)$request->end;
        }

        $products = Product::where($condition)->latest()->paginate(self::PER_PAGE);
        return view('client.product.shop', compact('products', 'start', 'end'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('client.product.detail', compact('product'));
    }
}
