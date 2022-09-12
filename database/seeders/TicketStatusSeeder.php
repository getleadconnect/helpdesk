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
        $data =  [
            [
              'name' => 'Pending',
              'description' => "Pending",
            ],
            [
              'name' => 'Completed',
              'description' => "Pending",
            ],
            [
              'name' => 'Overdue',
              'description' => "Overdue",
            ],
            [
              'name' => 'Started',
              'description' => "Started",
            ],
            [
            'name' => 'On Hold',
            'description' => "Pending",
            ],
            [
            'name' => 'Closed',
            'description' => "Closed",
            ],
            [
            'name' => 'In Progress',
            'description' => "In Progress",
            ]
          ];

          TicketStatus::insert($data);
    }
}
