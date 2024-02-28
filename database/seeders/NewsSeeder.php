<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Database\Factories\NewsFactory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsFactory::new()->count(50)->create(); // Menggunakan NewsFactory untuk membuat data
    }
}
