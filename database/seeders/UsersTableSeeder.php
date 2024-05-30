<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'first_name'=>'admin',
            'last_name'=>'admin',
            'user_name'=>'admin',
            'slug'=>'admin-admin',
            'role_id'=>'1',
            'status'=>'1',
            'otp'=>'',
            'email' => 'admin@partsseller.com',
            'password' => bcrypt('@Admin!23#'),
        ]);
        DB::table('users')->insert([
            'name' => 'User1',
            'first_name'=>'user1',
            'last_name'=>'user1',
            'user_name'=>'user1',
            'slug'=>'user-1',
            'role_id'=>'2',
            'otp'=>'',
            'status'=>'1',
            'email' => 'user1@email.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'first_name'=>'user2',
            'last_name'=>'user2',
            'user_name'=>'user2',
            'slug'=>'user-2',
            'role_id'=>'2',
            'status'=>'1',
            'otp'=>'',
            'email' => 'user2@email.com',
            'password' => bcrypt('password'),
        ]);
    }
}
