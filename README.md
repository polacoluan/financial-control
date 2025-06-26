# Financial Control

Financial Control is an API built with Laravel and the Apiato framework. It manages expenses, incomes and other financial data.

## Requirements
- PHP 8.1+
- Composer
- Node.js 18+
- Docker (for running via Laravel Sail)

## Local Setup

### Using Docker
1. Copy `.env.example` to `.env` and configure database credentials.
2. Build and start the containers:
   ```bash
   ./vendor/bin/sail up -d
   ```
3. Run database migrations:
   ```bash
   ./vendor/bin/sail artisan migrate
   ```
4. Install frontend dependencies and build assets:
   ```bash
   ./vendor/bin/sail npm install && ./vendor/bin/sail npm run build
   ```

### Without Docker
1. Install PHP and MySQL locally.
2. Run `composer install` and `npm install`.
3. Copy `.env.example` to `.env`, adjust values and run:
   ```bash
   php artisan key:generate
   php artisan migrate
   npm run build
   ```

## Running Tests
```
phpunit
```

## API Usage
Each container exposes its own routes. See the container specific README files under `app/Containers/AppSection/*/README.md` for detailed examples.
