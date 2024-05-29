<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1,
            'name' => 'Technology',
            'slug' => 'technology',
            'created_at' => now(),
            'updated_at' => now()
            ],
            ['id' => 2,
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'created_at' => now(),
            'updated_at' => now()
            ],
            ['id' => 3,
            'name' => 'Entertainment',
            'slug' => 'entertainment',
            'created_at' => now(),
            'updated_at' => now()
            ],
        ];

        Categories::insert($categories);
    }
}
