<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'id' => 1,
                'name' => 'Learning Laravel',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Laravel is a powerful PHP framework that makes web development easy, efficient, and enjoyable for developers of all levels. It provides an elegant syntax and various tools to make the process of building web applications smooth and productive. With Laravel, you can handle routing, sessions, caching, and authentication with ease. The framework also includes a powerful ORM called Eloquent, which makes database interactions simple and intuitive. Laravel’s Blade templating engine allows you to create clean and readable templates for your application.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 2,
                'name' => 'Mastering Eloquent',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Eloquent ORM makes it enjoyable to interact with your database in a fluent and expressive manner. You can easily define relationships, query your data, and even manage migrations with ease. Eloquent makes use of model classes which represent each table in your database. This powerful ORM includes features like eager loading, lazy loading, and relationship methods. Eloquent helps to keep your database queries clean and simple.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 3,
                'name' => 'Advanced Blade Templating',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Blade is the simple, yet powerful templating engine provided with Laravel. It allows you to write plain PHP code in your templates, providing a great deal of flexibility. Blade templates are compiled into plain PHP code and cached until they are modified. You can use components and slots to build complex, reusable template pieces. Blade also includes control structures such as loops and conditional statements.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 4,
                'name' => 'Laravel Authentication',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Laravel provides a built-in authentication system that is simple to set up and customize. It includes features like registration, login, password reset, and email verification. You can use guards to manage different types of authentication for different parts of your application. Laravel’s authentication system is secure and uses hashing to protect passwords. You can easily customize the authentication process to suit your specific needs.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 5,
                'name' => 'Task Scheduling with Laravel',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Laravel’s task scheduling features allow you to automate repetitive tasks in your application. You can schedule tasks to run at specific intervals using the built-in Cron syntax. The task scheduler is integrated with Artisan, Laravel’s command-line interface. You can use closures to define your scheduled tasks directly in your code. Laravel provides powerful tools for managing scheduled tasks and ensuring they run smoothly.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 6,
                'name' => 'Building APIs with Laravel',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Laravel makes it easy to build robust and scalable APIs using its built-in tools. You can use resources and transformers to format your API responses. Laravel includes support for API authentication using tokens and OAuth2. You can use middleware to handle common API tasks like rate limiting and CORS. Laravel’s routing system makes it simple to define your API endpoints and handle requests.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 7,
                'name' => 'Laravel and Vue.js Integration',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Laravel provides seamless integration with Vue.js, a popular JavaScript framework. You can use Vue components to build dynamic, reactive user interfaces in your Laravel application. Laravel Mix makes it easy to compile and manage your Vue assets. You can use Vue to handle front-end state management and interactivity. This integration allows you to build modern, full-stack web applications with ease.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 8,
                'name' => 'Testing with Laravel',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Laravel includes robust support for testing your applications with PHPUnit. You can write unit tests, feature tests, and browser tests to ensure your code is working as expected. Laravel’s testing tools make it easy to simulate user interactions and validate your application’s behavior. You can use factories to generate test data and seed your database. Testing is an important part of the development process and helps to ensure the quality of your code.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 9,
                'name' => 'Laravel Middleware',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Middleware provides a convenient mechanism for filtering HTTP requests entering your application. You can use middleware to perform tasks like authentication, logging, and CORS handling. Laravel includes several middleware out of the box, and you can create your own custom middleware. Middleware is defined in the `app/Http/Middleware` directory and can be applied to routes and controllers. Using middleware helps to keep your application logic clean and organized.',
                'original_filename' => 'laravel.png',
            ],
            [
                'id' => 10,
                'name' => 'Laravel Broadcasting',
                'author_id' => [2, 4][rand(0, 1)],
                'body' => 'Laravel Broadcasting allows you to broadcast events to your client-side application using WebSockets. You can use broadcasting to build real-time features like chat applications and notifications. Laravel supports several broadcasting drivers, including Pusher and Redis. You can use Laravel Echo to listen for events and update your UI in real-time. Broadcasting events can help to create a more interactive and engaging user experience.',
                'original_filename' => 'laravel.png',
            ],
        ];



        foreach ($posts as $postData) {
            // Generate a random filename
            $randomFilename = Str::random(40) . '.jpg';

            // Define the source and destination paths
            $sourcePath = public_path('create-post-images/' . $postData['original_filename']);
            $destinationPath = public_path('storage/post-images/' . $randomFilename);

            // Ensure the destination directory exists
            if (!File::isDirectory(public_path('storage/post-images'))) {
                File::makeDirectory(public_path('storage/post-images'), 0755, true);
            }

            // Move the file to the new location with the random name
            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destinationPath);
            } else {
                // Handle the case when the source file doesn't exist
                echo "Source file does not exist: " . $sourcePath . "\n";
                continue;
            }

            // Create post with specified data
            Posts::create([
                'id' => $postData['id'],
                'title' => $postData['name'],
                'slug' => Str::slug($postData['name']),
                'image_path' => 'post-images/' . $randomFilename,
                'author_id' => $postData['author_id'],
                // 'author_id' => [2, 4][rand(0, 1)], // Randomly select between 2 and 4
                'campus_id' => [1, 2, 3, 4, 5][array_rand([1, 2, 3, 4, 5])], // Randomly select one element from the array
                'categories_id' => [1, 2, 3][array_rand([1, 2, 3])], // Randomly select one element from the array
                'body' => $postData['body'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
