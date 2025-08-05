# 📘 User Manual – Expert System for LAN Network Damage Diagnosis (Laravel-Based Web App)

---

## 📖 Table of Contents

1. [Introduction](#introduction)
2. [System Overview](#system-overview)
3. [Technology Stack](#technology-stack)
4. [Installation Guide](#installation-guide)
5. [System Features](#system-features)
6. [Folder Structure](#folder-structure)
7. [How to Use the System](#how-to-use-the-system)
8. [Admin Panel Guide](#admin-panel-guide)
9. [Troubleshooting](#troubleshooting)
10. [Maintenance Tips](#maintenance-tips)
11. [License](#license)
12. [Credits](#credits)

---

## 🧩 Introduction

This expert system helps diagnose LAN (Local Area Network) issues based on user-selected symptoms. It utilizes **Forward Chaining** methods to determine the most likely issue and recommend solutions.

---

## 🌐 System Overview

The web application has two main user roles:

- **User**: Enters symptoms and receives diagnosis results.
- **Admin**: Manages rules, symptoms, damage types, and user history.

---

## ⚙️ Technology Stack

- **Laravel** – PHP framework
- **Jetstream (Livewire)** – Auth scaffolding and SPA experience
- **Tailwind CSS** – For UI design
- **SQLite / MySQL** – For database storage
- **JavaScript** – For UI interactivity
- **Browsershot** – For generating PDF reports

---

## 🛠️ Installation Guide

1. **Clone the Project**

```bash
git clone https://github.com/your-repo/lan-expert-system.git
cd lan-expert-system
```

2. **Install Dependencies**

```bash
composer install
npm install && npm run dev
```

3. **Environment Setup**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Database Migration**

```bash
php artisan migrate --seed
```

5. **Link Storage**

```bash
php artisan storage:link
```

6. **Run the Server**

```bash
php artisan serve
```

Access the app at `http://localhost:8000`.

---

## 🧠 System Features

### User

- Login/Register
- Select Symptoms
- View Diagnosis Results
- Download PDF Report

### Admin

- Manage Users
- Manage Symptoms
- Manage Damages
- Manage Rules (IF-THEN logic)
- View User Histories

---

## 📁 Folder Structure

```
├── app/
│   ├── Http/Controllers/          ← Main controllers
│   ├── Models/                    ← Eloquent models
│   └── Services/                  ← Custom logic (Diagnosis, CF)
├── resources/views/               ← Blade templates
├── routes/web.php                 ← Route definitions
├── database/seeders/             ← Sample data for symptoms, rules, etc.
├── public/                        ← Public assets
├── .env                           ← App config
```

---

## 🚀 How to Use the System

### User Flow

1. Register and login.
2. Navigate to “Diagnosis”.
3. Select symptoms related to the network issue.
4. Click **Diagnose**.
5. View result and download PDF if needed.

---

## 🔐 Admin Panel Guide

1. Login with admin credentials.
2. Access sidebar menu:
   - `Manage Users`
   - `Manage Symptoms`
   - `Manage Damages`
   - `Manage Rules`
   - `Diagnosis Histories`
3. Use forms to add/edit/delete entries.
4. Export histories as PDF.

---

## ❗ Troubleshooting

| Issue | Solution |
|-------|----------|
| CSS/JS not loading | Run `npm run dev` again |
| Storage errors | Run `php artisan storage:link` |
| Database error | Check `.env` DB settings and run migrations |
| Session expired | Clear browser cookies or restart server |
| Error 500 | Check logs in `storage/logs/laravel.log` |

---

## 🧼 Maintenance Tips

- Regularly backup `.env` and database.
- Clear cache: `php artisan config:clear`
- Update dependencies with caution.
- Monitor logs for suspicious activity.

---

## 📝 License

This system is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🙏 Credits

Developed by: **Rasta Maulana**  
Framework: [Laravel](https://laravel.com)  
Design: [Tailwind CSS](https://tailwindcss.com)

---
