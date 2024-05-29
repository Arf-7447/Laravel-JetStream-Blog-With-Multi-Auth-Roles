<?php

namespace Database\Seeders;

use App\Models\Posts;
use App\Models\User;
use Database\Factories\AuthorUserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PharIo\Manifest\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CampusTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);

        // Buat 20 pengguna dengan role_id 2
        User::factory()->count(20)->create([
            'role_id' => 2,
        ]);

        // Buat 10 pengguna dengan role_id 3
        User::factory()->count(69)->create([
            'role_id' => 3,
        ]);

        // Buat 600 Posts
        Posts::factory()->count(30)->create();
    }
}
