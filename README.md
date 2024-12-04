<p align="center"><img src="https://github.com/daniacademy/filament-skeleton/blob/7296a23ed3507c647b96fe4572cbd9a5da10073b/public/images/adminify.png" width="400" alt="Adminify Logo"></a></p>

# Filament Skeleton Template

This repository is a ready-to-use skeleton for building Laravel applications with Filament Admin. It includes several pre-configured packages and functionalities to streamline your development process.

## Features

-   **Filament Shield**: Role and permission management made simple.
-   **Spatie Health**: Monitor and ensure the health of your application.
-   **Laravel Audit**: Track model changes and activity.
-   **Task Scheduler Configuration**: Pre-configured tasks to handle essential maintenance:
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
-   **Security Headers and Content Security Policy (CSP)**: Middleware is included to enhance security using Spatie CSP.
-   **Customized Login Throttling**: Throttling behavior is adjusted to focus on individual users rather than their IP address, ensuring multiple users from the same IP are not blocked due to one user's failed attempts.
-   **Blade Font Awesome**: Easily integrate Font Awesome icons.
-   **Spatie Media Library Integration**: Seamless file and media management through Filament.

## Deployment Instructions

1. Create a new repository using this skeleton as a template.
2. Clone your new repository locally.
3. Install dependencies:
    ```bash
    composer install
    ```
4. Configure your database in the `.env` file.
5. Run migrations:
    ```bash
    php artisan migrate
    ```
6. Seed the database:
    ```bash
    php artisan db:seed
    ```
7. Create a super-admin user:
    ```bash
    php artisan shield:super-admin
    ```

## Notes

This template is designed to provide a robust starting point for Laravel applications built with Filament Admin. It includes pre-installed packages and essential configurations to reduce setup time and enhance productivity.

Feel free to customize and extend it as needed for your projects.
