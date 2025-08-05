<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 📚 Learning Laravel

Laravel has excellent learning resources:

- 📖 [Laravel Docs](https://laravel.com/docs)
- 🧪 [Laravel Bootcamp](https://bootcamp.laravel.com)
- 🎥 [Laracasts](https://laracasts.com)

---

## 📦 About This Project

This project is built with:

- **Laravel** – PHP Framework for Web Artisans.
- **Laravel Jetstream** – Authentication scaffolding and team management.
- **Tailwind CSS** – Utility-first CSS framework for styling.
- **Livewire** *(Optional)* – For reactive frontend (if Livewire stack is used).
- **Alpine.js** – Lightweight JavaScript framework used with Jetstream (for Livewire).
- **SQLite / MySQL** – As the database (customizable).
- **Spatie Browsershot** *(if enabled)* – For PDF generation.
- **Other Libraries** – Depending on features added.

---

## 📁 Laravel Jetstream Directory Structure

Here's the general folder structure with important directories:

```
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   ├── Models/
│   └── Providers/
│
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── lang/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   ├── views/         ← Blade files (e.g., layouts, auth, dashboard)
│   └── markdown/
│
├── routes/
│   ├── web.php        ← Web routes
│   └── api.php        ← API routes
│   
│
├── storage/
├── tests/
├── .env               ← Environment config
├── artisan
└── composer.json
```

---

## How To Run This Project !
- Clone this project
- Run command "composer install ", "npm Install", & "npm run dev"
- Run command "cp .env.example .env" and "php artisan key:generate" then configure env ( your database name, app_url & filesystem_disk)
- Run command "php artisan storage:link"
- Last step, run command "php artisan migrate --seed" & start app with "php artisan serve"

---

## 🛠️ Important Folders to Edit

| **Folder/File**      | **Function**                                                               |
|----------------------|----------------------------------------------------------------------------|
| `app/Http/Controllers/` | Main controllers to handle logic and request                           |
| `app/Models/`         | Eloquent models for database interaction                                 |
| `routes/web.php`      | Website routes                                                           |
| `routes/api.php`      | API routes (if used)                                                     |
| `resources/views/`    | All Blade view files                                                     |
| `resources/css/`      | CSS files including Tailwind                                             |
| `resources/js/`       | JS files and config for Livewire/Inertia                                |
| `.env`                | Environment configuration (DB, mail, port, etc.)                         |
| `config/`             | Application configuration (Jetstream, Mail, Auth, etc.)                  |
| `database/migrations/`| Database structure definitions                                           |
| `storage/`            | File storage (uploads, logs, etc.)                                       |

---

## 🧪 Basic Troubleshooting

| **Common Issue**                        | **Solution**                                                               |
|----------------------------------------|----------------------------------------------------------------------------|
| Composer error / missing vendor        | Run: `composer install`                                                   |
| Cannot access a specific page          | Check `routes/web.php` and make sure proper middleware is used            |
| CSS not loading                        | Run `npm install && npm run dev`                                          |
| Uploads not working                    | Run: `php artisan storage:link`                                           |
| Login/register failing                 | Check validation and `.env` (MAIL / DB / SESSION_DRIVER)                  |
| "Target class does not exist" error    | Check namespace and run `composer dump-autoload`                          |
| Error 500 in production                | Enable debug in `.env` and check `storage/logs` for details               |

---


## 🤝 Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## 🔒 Security

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
