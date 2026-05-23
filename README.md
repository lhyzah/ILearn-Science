# Vibe App

A beginner-friendly Laravel app prepared for shared hosting such as DreamHost.

## Requirements

- PHP 8.3 or newer
- Composer
- MySQL database

## Fresh Laravel install command

Use this on a machine that already has PHP and Composer installed:

```bash
composer create-project laravel/laravel vibe-app
cd vibe-app
```

This prepared project already contains the controller, routes, Blade view, MySQL `.env` placeholders, and public CSS/JS assets.

## Install this prepared project

This workspace includes local PHP and Composer wrappers in `../.tools`, so the app can run even without a global PHP/Homebrew install.

```bash
cd vibe-app
PATH="../.tools:$PATH" composer install
PATH="../.tools:$PATH" php artisan key:generate
../.tools/frankenphp php-server --root public --listen 127.0.0.1:8000
```

Open:

```text
http://127.0.0.1:8000
```

## Environment

Local `.env` values are already set for MySQL placeholders:

```dotenv
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Replace the database placeholders with your real hosting credentials.

## Routes

- `GET /` shows the homepage.
- `POST /generate` handles the form and returns `Generated successfully`.

## Shared hosting

No Node.js, npm, or Vite build step is required. Tailwind CSS is loaded from CDN, and local assets are served from `public/css` and `public/js` with Laravel's `asset()` helper.

See `SHARED_HOSTING.md` for upload and production optimization notes.
