<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'name' => $request->name,
            'price' => $request->price,
            'is_highlight' => $request->is_highlight,
            'quantity' => $request->quantity,
            'avatar' => $request->avatar,
            'detail' => $request->detail,
            'description' => $request->description
        ]);

        // session()->flash('success','Tạo mới sản phẩm thành công');
        return redirect()->route('admin.products.edit',$product->id)
                ->with('success','tạo mới sản phẩm thành công');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->product_code = $request->product_code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->is_highlight = $request->is_highlight;
        $product->quantity = $request->quantity;
        $product->avatar = $request->avatar;
        $product->detail = $request->detail;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('admin.products.edit',$product->id)
        ->with('success','Sửa sản phẩm thành công !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
