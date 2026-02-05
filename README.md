# Uptech Solution - Laravel 11 App

Project management, tasks, support tickets, and leave management for Uptech Solution.

## Requirements
- PHP 8.2+
- Composer
- Node.js + npm
- MySQL

## Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

## Default Logins
- **Super Admin**: admin@uptech.test / password
- **Sales Manager**: sales@uptech.test / password
- **Development Manager**: devmanager@uptech.test / password
- **Developer**: dev1@uptech.test / password
- **SEO Specialist**: seo1@uptech.test / password
- **Graphics Designer**: gfx1@uptech.test / password

## Notes
- AdminLTE 3 is loaded via CDN.
- PWA assets live in `public/manifest.json` and `public/sw.js`.
- AJAX status updates use `/api/*` endpoints.
