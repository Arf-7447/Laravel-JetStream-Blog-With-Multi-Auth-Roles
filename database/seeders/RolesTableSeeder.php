<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
            ['id' => 1,
            'name' => 'Admin',
            'slug' => 'admin',
            ],
            ['id' => 2,
            'name' => 'Author',
            'slug' => 'author'
            ],
            ['id' => 3,
            'name' => 'User',
            'slug' => 'user'
            ],
        ];

        Roles::insert($roles);
    }
}
