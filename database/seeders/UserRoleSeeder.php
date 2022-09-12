<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
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
                'role_name' => "Super Admin",
            ],
            [
                'role_id' => 2,
                'role_name' => "Staff",
            ],
            [
                'role_id' => 3,
                'role_name' => "User",
            ],
          ];

          UserRole::insert($data);
    }
}
