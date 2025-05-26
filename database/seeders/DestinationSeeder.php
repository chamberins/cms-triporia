<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Category;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first() ?? Category::create(['name' => 'Wisata Alam']);

        Destination::create([
            'name' => 'Pantai Indah',
            'category_id' => $category->id,
            'description' => 'Pantai dengan pasir putih dan ombak tenang.',
            'image' => null,
            'price' => 'Rp 10.000',
            'latitude' => '-6.1234567',
            'longitude' => '106.1234567',
        ]);
        Destination::create([
            'name' => 'Gunung Sejuk',
            'category_id' => $category->id,
            'description' => 'Gunung dengan udara sejuk dan pemandangan indah.',
            'image' => null,
            'price' => 'Rp 20.000',
            'latitude' => '-6.2345678',
            'longitude' => '106.2345678',
        ]);
        Destination::create([
            'name' => 'Air Terjun Pelangi',
            'category_id' => $category->id,
            'description' => 'Air terjun dengan pelangi alami setiap pagi.',
            'image' => null,
            'price' => 'Gratis',
            'latitude' => '-6.3456789',
            'longitude' => '106.3456789',
        ]);
    }
}
