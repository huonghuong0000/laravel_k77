<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PER_PAGE = 6;

    public function index()
    {
        $products= Product::latest()->with('category')->paginate(self::PER_PAGE); //paginate(): giới hạn bản ghi trên 1 trang
        // $products = Product::paginate(7);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Get the sub categories.
     * 
     * @param int $parent_id
     * @return mix
     */
    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $categories = Category::where('parent_id', $parent_id)
            ->where('id', '<>', $ignore_id)
            ->get()
            ->map(function($query) use($ignore_id){
                $query->sub = $this->getSubCategories($query->id, $ignore_id);
                return $query;
            });
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            // 'avatar' => 'sometimes|image'
        ]);

        $attributes = $request->only([
            'category_id', 
            'name', 
            'product_code', 
            'price', 
            'is_highlight',
            'detail',
            'description',
            'quantity'
        ]);

        if ($request->hasFile('avatar'))
        {
            // $destinationDir = public_path('assets/admin/img'); //trả về vị trí đúng (đường dẫn cứng)
            // $fileName = uniqid('vietpro').'.'.$request->avatar->extension();
            // $request->avatar->move($destinationDir, $fileName);
            // $attributes['avatar'] = '/assets/admin/img/'.$fileName;
            $file = $request->avatar;
            $file_name = str_slug($request->name).'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/img',$file_name);
            $attributes['avatar'] = $file_name;
        }

        $product = Product::create($attributes);
        return redirect()->route('admin.products.edit', $product->id)->with('success', 'Tạo mới thành công');
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
        $categories = $this->getSubCategories(0, $id);
        return view('admin.products.edit', compact('product', 'categories'));
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
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            // 'avatar' => 'sometimes|image'
        ]);

        $product = Product::findOrFail($id);
        // $category = Category::findOrFail($id);

        $attributes = $request->only([
            'category_id', 
            'name', 
            'product_code', 
            'price', 
            'is_highlight',
            'detail',
            'description',
            'quantity'
        ]);

        if ($request->hasFile('avatar'))
        {
            // $destinationDir = public_path('assets/admin/img'); //trả về vị trí đúng (đường dẫn cứng)
            // $fileName = uniqid('vietpro').'.'.$request->avatar->extension();
            // $request->avatar->move($destinationDir, $fileName);
            // $attributes['avatar'] = '/assets/admin/img/'.$fileName;
            $file = $request->avatar;
            $file_name = str_slug($request->name).'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/img',$file_name);
            $attributes['avatar'] = $file_name;
        }

        $product = $product->fill($attributes);
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
        // echo 'Xóa sp';
        $product = Product::destroy($id);
        return redirect()->route('admin.products.index')
        ->with('success','Xóa sản phẩm thành công !!!');
    }
}
