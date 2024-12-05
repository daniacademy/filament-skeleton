<p align="center"><img src="https://github.com/daniacademy/filament-skeleton/blob/c21d336b05e91e2ddc0914611d3fbe74555f9f88/public/images/adminify.png" width="400" alt="Adminify Logo"></a></p>

# Filament Skeleton Template

This repository is a ready-to-use skeleton for building Laravel applications with Filament Admin. It includes several pre-configured packages and functionalities to streamline your development process.

## Features

-   <a href="https://github.com/bezhanSalleh/filament-shield" target="_blank">**Filament Shield**</a>: Role and permission management made simple.
-   <a href="https://github.com/spatie/laravel-health" target="_blank">**Spatie Health**</a>: Monitor and ensure the health of your application.
-   <a href="https://laravel-auditing.com/" target="_blank">**Laravel Audit**: Track model changes and activity.
-   <a href="https://laravel.com/docs/11.x/scheduling" target="_blank">**Task Scheduler Configuration**</a>: Pre-configured tasks to handle essential maintenance:
    ```php
    Schedule::command('queue:work --stop-when-empty')->everyMinute()
        ->withoutOverlapping();
    Schedule::command('health:queue-check-heartbeat')->everyMinute();
    Schedule::command('logs:clean')->daily()->at('00:00');
    Schedule::command('audit:clean')->daily()->at('00:30');
    Schedule::command('backup:clean')->daily()->at('01:00');
    Schedule::command('backup:run')->daily()->at('01:30');
    Schedule::command('db:optimize')->daily()->at('03:00');
    ```
-   <a href="https://github.com/spatie/laravel-csp" target="_blank">**Security Headers and Content Security Policy (CSP)**</a>: Middleware is included to enhance security using Spatie CSP.
-   <a href="https://laravel.com/docs/11.x/authentication" target="_blank">**Customized Login Throttling**</a>: Throttling behavior is adjusted to focus on individual users rather than their IP address, ensuring multiple users from the same IP are not blocked due to one user's failed attempts.
-   <a href="https://github.com/owenvoke/blade-fontawesome" target="_blank">**Blade Font Awesome**</a>: Easily integrate Font Awesome icons.
-   <a href="https://filamentphp.com/plugins/filament-spatie-media-library" target="_blank">**Spatie Media Library Integration**</a>: Seamless file and media management through Filament.
-   <a href="https://filamentphp.com/docs/3.x/notifications/installation" target="_blank">**Filament Notifications**</a>: Customize elegant and dynamic notifications with icons, colors, and interactive actions.
-   <a href="https://filamentphp.com/plugins/joaopaulolndev-edit-profile" target="_blank">**Edit Profile**</a>: Allow users to easily update their profile information and securely change their password directly from the Filament panel.

## Deployment Instructions

1. Create a new repository using this skeleton as a template.
2. Clone your new repository locally.
3. Install dependencies:
    ```bash
    composer install
    ```
4. Copy the `.env.example` file and rename it to `.env`:
    ```bash
    cp .env.example .env
    ```
5. Configure your database and other environment variables in the `.env` file.
6. Generate the application key:
    ```bash
    php artisan key:generate
    ```
7. Run migrations:
    ```bash
    php artisan migrate
    ```
8. Seed the database:
    ```bash
    php artisan db:seed
    ```
9. Create a super-admin user:
    ```bash
    php artisan shield:super-admin
    ```

## Default Super-Admin Credentials

The default credentials for accessing the application as a super-admin are:

-   **Email**: `admin@example.com`
-   **Password**: `123456`

By default, you can access the admin panel at [http://localhost/admin](http://localhost/admin). Ensure your local server is running, and the necessary configurations in your `.env` file are correctly set up to avoid access issues.

## Notes

This template is designed with love ❤️ to provide a robust starting point for Laravel applications built with Filament Admin. It includes pre-installed packages and essential configurations to reduce setup time and enhance productivity.

Feel free to customize and extend it as needed for your projects.
