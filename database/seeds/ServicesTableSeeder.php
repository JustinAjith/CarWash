<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => 'Quick Wash',
                'amount' => '1000.00'
            ],
            [
                'name' => 'Detailed Wash',
                'amount' => '2500.00'
            ],
            [
                'name' => 'Super Wash',
                'amount' => '5000.00'
            ],
            [
                'name' => 'Ultimate Wash',
                'amount' => '8000.00'
            ]
        ];

        DB::table('services')->insert($datas);
    }
}
