<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('products')->delete();
        DB::table('products')->insert([
            ['category_id'=>6, 'product_code'=>'SP02','name'=>'Quần vải nam', 'price'=>500000, 'is_highlight'=>0, 'quantity' => 1,'avatar'=>'Quan vai nam 1.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>3, 'product_code'=>'SP03','name'=>'Áo phông nữ', 'price'=>500000, 'is_highlight'=>1, 'quantity' => 0, 'avatar'=>'Ao phong nu 1.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>5, 'product_code'=>'SP04','name'=>'Áo phông nam', 'price'=>500000, 'is_highlight'=>0, 'quantity' => 1,'avatar'=>'Ao phong nam 1.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>7, 'product_code'=>'SP05','name'=>'Áo khoác dạ nữ', 'price'=>500000, 'is_highlight'=>1, 'quantity' => 0,'avatar'=>'Ao khoac da nu.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>8, 'product_code'=>'SP06','name'=>'Áo cộc nữ', 'price'=>500000, 'is_highlight'=>0, 'quantity' => 1,'avatar'=>'Ao coc nu 1.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>2, 'product_code'=>'SP07','name'=>'Quần bò nữ', 'price'=>500000, 'is_highlight'=>1, 'quantity' => 0,'avatar'=>'Quan bo nu 1.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>3, 'product_code'=>'SP08','name'=>'Áo thun nữ', 'price'=>500000, 'is_highlight'=>0, 'quantity' => 1,'avatar'=>'Ao thun nu 1.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>5, 'product_code'=>'SP09','name'=>'Áo thun nam', 'price'=>500000, 'is_highlight'=>1, 'quantity' => 0,'avatar'=>'Ao thun nam 1.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>7, 'product_code'=>'SP10','name'=>'Áo khoác bò', 'price'=>500000, 'is_highlight'=>0, 'quantity' => 1,'avatar'=>'Khoac bo nu 1.jpg', 'detail' => 'Đẹp'],
            ['category_id'=>6, 'product_code'=>'SP11','name'=>'Quần bò nam', 'price'=>500000, 'is_highlight'=>1, 'quantity' => 0,'avatar'=>'Quan bo nam 1.jpg', 'detail' => 'Đẹp']
        ]);
    }
}
