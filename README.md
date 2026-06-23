# TestMatrics Project Skeleton

This folder is a minimal scaffold to get TestMatrics Phase 1 started locally.

Quick start:

```powershell
cd project
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run dev
php artisan migrate
php artisan serve
```

To enable auth scaffolding (Livewire Breeze):

```powershell
composer require laravel/breeze --dev
php artisan breeze:install livewire
npm install
npm run dev
php artisan migrate
```
