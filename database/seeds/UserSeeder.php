<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id'=>3, 'email'=>'ngohuong@gmail.com','password'=>bcrypt('123456'), 'name'=>'Ngô Hương', 'address'=>'Hà Nội', 'phone' => '0124578'],
            ['id'=>4, 'email'=>'nguyenthao@gmail.com','password'=>bcrypt('123456'), 'name'=>'Nguyễn Thảo', 'address'=>'Bắc Ning', 'phone' => '0124578'],
            ['id'=>5, 'email'=>'quynhhuong@gmail.com','password'=>bcrypt('123456'), 'name'=>'Quỳnh Hương', 'address'=>'Hải Phòng', 'phone' => '0124578'],
            ['id'=>6, 'email'=>'phuongthao@gmail.com','password'=>bcrypt('123456'), 'name'=>'Phương Thảo', 'address'=>'Đã Nẵng', 'phone' => '0124578'],
        ]);
    }
}
