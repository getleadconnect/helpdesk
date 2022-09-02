<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TicketStatus;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_by = auth('sanctum')->id();
        $data =  [
            [
              'name' => 'Pending',
              'description' => "Pending",
              'created_by' => $created_by
            ],
            [
              'name' => 'Completed',
              'description' => "Pending",
              'created_by' => $created_by
            ],
            [
              'name' => 'Overdue',
              'description' => "Overdue",
              'created_by' => $created_by
            ],
            [
              'name' => 'Started',
              'description' => "Started",
              'created_by' => $created_by
            ],
            [
            'name' => 'On Hold',
            'description' => "Pending",
            'created_by' => $created_by
            ],
            [
            'name' => 'Closed',
            'description' => "Closed",
            'created_by' => $created_by
            ],
            [
            'name' => 'In Progress',
            'description' => "In Progress",
            'created_by' => $created_by
            ]
          ];

          TicketStatus::insert($data);
    }
}
