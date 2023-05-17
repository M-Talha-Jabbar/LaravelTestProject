<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;

class WebsitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'webname' => 'Website 1',
        ]);

        Website::create([
            'webname' => 'Website 2',
        ]);
    }
}
