<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Akahiro',
                'email' => 'akahiro@gmail.com',
                'slug' => 'akahiro',
                'role_id' => 1,
                'password' => 'Realneko7447',
                'original_filename' => 'aka.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Rasya Elvira',
                'email' => 'rasya@gmail.com',
                'role_id' => 2,
                'slug' => 'rasya-elvira',
                'password' => 'KaiNyanya027_',
                'original_filename' => 'rasya.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Galahad',
                'email' => 'galahad@gmail.com',
                'role_id' => 3,
                'slug' => 'galahad',
                'password' => 'galahad1234',
                'original_filename' => 'galahad.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Sergey Kirov',
                'email' => 'kirov@gmail.com',
                'role_id' => 2,
                'slug' => 'kirov',
                'password' => 'kirov1234',
                'original_filename' => 'kirov.jpg',
            ],
            [
                'id' => 5,
                'name'=> 'Chunchunmaru',
                'email' => 'chunchunmaru@gmail.com',
                'role_id' => 3,
                'slug' => 'chunchunmaru',
                'password' => 'chunchunmaru1234',
                'original_filename' => 'chunchunmaru.jpg',
            ]
        ];

        foreach ($users as $userData) {
            // Extract the file extension
            // $extension = pathinfo($userData['original_filename'], PATHINFO_EXTENSION);

            // Generate a random filename with the original extension
            // $randomFilename = Str::random(40) . '.' . $extension;

            // Generate a random filename
            $randomFilename = Str::random(40) . '.jpg';

            // Define the source and destination paths
            $sourcePath = public_path('images/' . $userData['original_filename']);
            $destinationPath = public_path('storage/profile-photos/' . $randomFilename);

            // Ensure the destination directory exists
            if (!File::isDirectory(public_path('storage/profile-photos'))) {
                File::makeDirectory(public_path('storage/profile-photos'), 0755, true);
            }

            // Move the file to the new location with the random name
            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destinationPath);
            } else {
                // Handle the case when the source file doesn't exist
                echo "Source file does not exist: " . $sourcePath . "\n";
                continue;
            }

            // Create user with specified data and hashed password
            User::create([
                'id' => $userData['id'],
                'name' => $userData['name'],
                'email' => $userData['email'],
                'role_id' => $userData['role_id'],
                'slug' => $userData['slug'],
                'profile_photo_path' => 'profile-photos/' . $randomFilename,
                'email_verified_at' => now(),
                'password' => Hash::make($userData['password']),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

