<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            ['id'=>1, 'name'=>'Nguyễn Đăng Tiến', 'phone'=>'023456789', 'address'=>'Bạch Đằng, Hà Nội', 'email'=>'tien@gmail.com'],
            ['id'=>2, 'name'=>'Nguyễn Văn Nam', 'phone'=>'023456789', 'address'=>'Định Công, Hà Nội', 'email'=>'nam123@gmail.com'],
            ['id'=>3, 'name'=>'Nguyễn Thị Lan', 'phone'=>'023456789', 'address'=>'Định Công Thượng, Hà Nội', 'email'=>'lan@gmail.com'],
            ['id'=>4, 'name'=>'Hoàng Hà Anh', 'phone'=>'023456789', 'address'=>'Phú Thọ, Hà Nội', 'email'=>'hoanganh@gmail.com'],
            ['id'=>5, 'name'=>'Nguyễn Thị Hồng', 'phone'=>'023456789', 'address'=>'Sóc Sơn, Hà Nội', 'email'=>'hong@gmail.com'],
            ['id'=>6, 'name'=>'Đào Bình Thuận', 'phone'=>'023456789', 'address'=>'Đan Phượng, Hà Nội', 'email'=>'thuan@gmail.com'],
        ]);
    }
}
