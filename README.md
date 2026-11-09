# Servio server

Laravel 12 API and Filament admin panel for Servio, a service-provider directory. The Flutter client is [servio](https://github.com/Ali-Elchab/servio).

**Status:** in development.

## Features

- Categories with parent and child levels
- Providers with profiles, media, stats and payments; only active, approved providers are listed
- Search by category, text, location, and radius around a latitude and longitude
- Ratings and favorites
- Cities and areas
- Sanctum token auth: register, login, logout and account deletion
- API-key guard on every route (`servio_key` header) and Arabic and English responses
- Filament admin panel at `/admin` for categories, locations, providers and provider payments

## Stack

PHP 8.2+, Laravel 12, Filament 3.3, Sanctum, SQLite by default (MySQL supported), PHPUnit

## API overview

| Method | Path | Auth |
|---|---|---|
| GET | `/api/categories`, `/api/categories/{id}`, `/api/categories/{id}/children` | API key |
| GET | `/api/providers`, `/api/providers/{id}`, `/api/providers/{id}/ratings` | API key |
| POST | `/api/auth/register`, `/api/auth/login` | API key |
| POST, DELETE | `/api/auth/logout`, `/api/auth/delete` | API key, token |
| POST, PUT, DELETE | `/api/providers`, `/api/providers/{id}` | API key, token |
| GET | `/api/providers/me`, `/api/providers/me/stats` | API key, token |
| GET | `/api/cities`, `/api/cities/{id}/areas` | API key |
| GET, POST | `/api/favorites`, `/api/favorites/{provider}` | API key, token |

## Run it

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Set your database in `.env` and add `SERVIO_KEY=<a long random value>`. Then:

```bash
php artisan migrate --seed
php artisan serve
```

The seeders create categories, cities, roles, users and sample providers.

## Tests

```bash
php artisan test
```

The repository only has the default example tests so far.
