<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Cart;

class CartController extends Controller
{
    public function cart()
    {
        // Cart::clear();
        return view('client.cart.cart');
    }

    public function checkout()
    {
        return view('client.cart.checkout');
    }

    public function complete()
    {
        return view('client.cart.complete');
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);
        Cart::add(array(
            'id' => $request->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => [ 'avatar' => $product->avatar ]
        ));

        return response()->json(['quantity' => Cart::getTotalQuantity()], 200);
        
    }

    public function update(Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        $summedPrice = Cart::get($request->id)->getPriceSum();
        return response()->json([
            'summedPrice' => number_format($summedPrice),
            'getSubTotal' => number_format(Cart::getSubTotal()),
            'getTotal' => number_format(Cart::getTotal())
        ], 200);
        //200: thành công và trả về gì đó
        //204: thành công và không trả về gì
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $attributes = $request->only([
            'name', 'email', 'address', 'phone'
        ]);
        $attributes['status']='process';

        $order = Order::create($attributes);
        //
        foreach (Cart::getContent() as $item) {
            $order->orderDetails()->create([
                'product_id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->quantity
            ]);
        }
        //$order->orderDetail()->get(); //lấy thông tin chi tiết đơn hàng

        Cart::clear(); 
        return redirect('/cart/complete');
    } 

    public function destroy(Request $request)
    {
        Cart::remove($request->id);
        // return response()->json([
        //     'summedPrice' => number_format($summedPrice),
        //     'getSubTotal' => number_format(Cart::getSubTotal()),
        //     'getTotal' => number_format(Cart::getTotal())
        // ], 202);
        return response()->json([], 204);
    }
}
