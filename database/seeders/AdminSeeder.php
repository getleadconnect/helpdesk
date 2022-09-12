<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  [
            [
                'role_id' => 1,
                'first_name' => "GetLead",
                'last_name' => "Tech",
                'mobile' => '1234567890',
                'password' => bcrypt('password'),
                'email' => 'getLead@gmail.com',
                'int_status' => 1
            ]
          ];

          User::insert($data);
    }
}
