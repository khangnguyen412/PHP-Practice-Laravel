<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\lecture13\model_lecture13_level;

class DatabaseSeederLevel extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        model_lecture13_level::create([
            'name' => 'Brozen',
            'description' => 'Discount 20%'
        ]);
        model_lecture13_level::create([
            'name' => 'Silver',
            'description' => 'Discount 30%'
        ]);
        // model_lecture13_level::factory()->create();
    }
}
