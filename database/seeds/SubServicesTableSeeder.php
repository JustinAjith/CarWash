<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubServicesTableSeeder extends Seeder
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
                'name' => 'Exterior Hand Wash',
                'service_id' => '1'
            ],
            [
                'name' => 'Towel Hand Dry',
                'service_id' => '1'
            ],
            [
                'name' => 'Wheel Shine',
                'service_id' => '1'
            ],
            [
                'name' => 'Exterior Hand Wash',
                'service_id' => '2'
            ],
            [
                'name' => 'Towel Hand Dry',
                'service_id' => '2'
            ],
            [
                'name' => 'Wheel Shine',
                'service_id' => '2'
            ],
            [
                'name' => 'Tire Dressing',
                'service_id' => '2'
            ],
            [
                'name' => 'Windows In & Out',
                'service_id' => '2'
            ],
            [
                'name' => 'Sealer Hand Wax',
                'service_id' => '2'
            ],
            [
                'name' => 'Exterior Hand Wash',
                'service_id' => '3'
            ],
            [
                'name' => 'Towel Hand Dry',
                'service_id' => '3'
            ],
            [
                'name' => 'Wheel Shine',
                'service_id' => '3'
            ],
            [
                'name' => 'Tire Dressing',
                'service_id' => '3'
            ],
            [
                'name' => 'Windows In & Out',
                'service_id' => '3'
            ],
            [
                'name' => 'Sealer Hand Wax',
                'service_id' => '3'
            ],
            [
                'name' => 'Interior Vacuum',
                'service_id' => '3'
            ],
            [
                'name' => 'Door Shuts & Plastics',
                'service_id' => '3'
            ],
            [
                'name' => 'Dashboard Clean',
                'service_id' => '3'
            ],
            [
                'name' => 'Air Freshener',
                'service_id' => '3'
            ],
            [
                'name' => 'Exterior Hand Wash',
                'service_id' => '4'
            ],
            [
                'name' => 'Towel Hand Dry',
                'service_id' => '4'
            ],
            [
                'name' => 'Wheel Shine',
                'service_id' => '4'
            ],
            [
                'name' => 'Tire Dressing',
                'service_id' => '4'
            ],
            [
                'name' => 'Windows In & Out',
                'service_id' => '4'
            ],
            [
                'name' => 'Sealer Hand Wax',
                'service_id' => '4'
            ],
            [
                'name' => 'Interior Vacuum',
                'service_id' => '4'
            ],
            [
                'name' => 'Door Shuts & Plastics',
                'service_id' => '4'
            ],
            [
                'name' => 'Dashboard Clean',
                'service_id' => '4'
            ],
            [
                'name' => 'Air Freshener',
                'service_id' => '4'
            ],
            [
                'name' => 'Triple Coat Hand Wax',
                'service_id' => '4'
            ],
            [
                'name' => 'Exterior Vinyl Protectant',
                'service_id' => '4'
            ],
            [
                'name' => 'Rain-X Complete',
                'service_id' => '4'
            ],
        ];
        DB::table('sub_services')->insert($datas);
    }
}
