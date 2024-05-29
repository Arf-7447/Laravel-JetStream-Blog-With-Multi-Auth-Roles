<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Seeder;
class CampusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campus = [
            ['id' => 1,
            'name' => 'ITD Adisutjipto',
            'slug' => 'itd-adisutjipto',
            'created_at' => now(),
            'updated_at' => now()
            ],
            ['id' => 2,
            'name' => 'UGM',
            'slug' => 'ugm',
            'created_at' => now(),
            'updated_at' => now()
            ],
            ['id' => 3,
            'name' => 'UIN',
            'slug' => 'uin',
            'created_at' => now(),
            'updated_at' => now()
            ],
            ['id' => 4,
            'name' => 'UNY',
            'slug' => 'uny',
            'created_at' => now(),
            'updated_at' => now()
            ],
            ['id' => 5,
            'name' => 'UNPAS',
            'slug' => 'unpas',
            'created_at' => now(),
            'updated_at' => now()
            ]
        ];

        Campus::insert($campus);
    }
}
