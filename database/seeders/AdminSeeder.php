<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'first_name'=>'Admin',
            'last_name'=>'User',
            'address'=>'Location A',
            'phone'=>123456,
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('Password#123'),
            'type'=>'Admin',
        ]);
    }
}
