<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::truncate();

        RoomType::create([
            'name'  => 'Junior Suite',
        ]);

        RoomType::create([
            'name'  => 'Standard',
        ]);

        RoomType::create([
            'name'  => 'Suite',
        ]);

        RoomType::create([
            'name'  => 'Superior',
        ]);
    }
}
