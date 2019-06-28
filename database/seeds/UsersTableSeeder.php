<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'=>'Admin User',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1234')
            ]
        ];
        DB::table('users')->insert($data);
    }
}
