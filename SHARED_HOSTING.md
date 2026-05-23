# Shared Hosting Deployment Notes

This project is prepared to run without Node.js, Vite, or npm build steps.

## Local setup

Install PHP 8.3 or newer and Composer first.

```bash
composer create-project laravel/laravel vibe-app
cd vibe-app
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

For this prepared project, run these commands from inside `vibe-app`:

```bash
composer install
php artisan key:generate
php artisan serve
```

Open `http://localhost:8000`.

## Environment values

Update these placeholders in `.env` with the MySQL values from your host:

```dotenv
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Keep this value for local development:

```dotenv
APP_URL=http://localhost
```

For production, change `APP_ENV=production`, set `APP_DEBUG=false`, and update `APP_URL` to your real domain.

## Public folder

On shared hosting, the web root should point to the `public` folder. If your host uses a fixed folder such as `public_html`, upload the contents of Laravel's `public` folder there and keep the rest of the Laravel project outside the public web root when your host allows it.

The files in `public/css` and `public/js` are loaded with Laravel's `asset()` helper.

## Production optimization

After uploading and setting `.env`, run:

```bash
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Make sure `storage` and `bootstrap/cache` are writable by the hosting account.
