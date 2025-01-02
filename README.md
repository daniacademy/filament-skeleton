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
-   <a href="https://laravel.com/docs/11.x/eloquent-relationships#preventing-lazy-loading" target="_blank">**Disable lazy loading in Laravel with `preventLazyLoading()` method**</a>: Taylor Otwell tweeted about this new feature available in Laravel 8.43.0 that disables lazy loading your Eloquent models, avoiding the N+1 problem. This way every time you use lazy loading, an exception will be thrown, but only on non-production environment, so no need to worry about crashing your production if you miss something.
-   **Production Script in Composer**: This script optimizes a Laravel and Filament application for a production environment. It performs the following actions: runs composer dump-autoload -o, caches configuration, routes, and views, caches Filament components, and executes Laravel's optimization commands.
-   <a href="https://github.com/nunomaduro/phpinsights" target="_blank">**PHP Insights**</a>: This project comes with PHP Insights pre-configured and ready to use, providing real-time code quality analysis, including maintainability, complexity, and security insights. Easily ensure your codebase adheres to modern best practices without additional setup.

## How to Use

This project can be deployed in two ways: as a **Composer project** or as a **GitHub template**. Regardless of the chosen method, make sure to continue with the **"How to deploy"** section to complete the installation and configuration.

### Option 1: Using Composer

1. Create your project with Composer:
    ```bash
    composer create-project daniacademy/filament-skeleton projectName
    ```
2. Then, proceed to the steps in the **"How to deploy"** section.

### Option 2: Using GitHub Template

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
5. Finally, continue with the steps in the **"How to deploy"** section.

## How to deploy

1. Ensure that you are located in the root directory of the application before proceeding with the deployment steps.
2. Configure your database and other environment variables in the `.env` file.
3. Generate the application key:
    ```bash
    php artisan key:generate
    ```
4. Run migrations:
    ```bash
    php artisan migrate
    ```
5. Seed the database:
    ```bash
    php artisan db:seed
    ```
6. Create a super-admin user:
    ```bash
    php artisan shield:super-admin
    ```

## Running on production environment

1. **Optimize the Laravel and Filament Application**
   It is highly recommended to optimize Laravel and Filament to enhance the application's performance. To do so, run the following command:
    ```bash
    composer production
    ```
    Remember to execute this command after making any changes or deploying a new release to production.
2. **Review `canAccessPanel()` Method for Production**

    For enhanced security in a production environment, it's recommended to review and customize the `canAccessPanel()` method within the `User` model. This method controls access to the admin panel and can be tailored to enforce specific conditions, such as restricting access based on user roles, permissions, or other business logic.

    By default, the `canAccessPanel()` method in the `User` model returns `true`, allowing all users to access the admin panel.

    **Default Implementation:**

    ```php
    public function canAccessPanel(): bool
    {
        return true;
    }
    ```

    To adapt the method for your production environment, you can define specific conditions based on your application's requirements. Below is an example of how to customize the `canAccessPanel()` method:

    **Example: Customizing `canAccessPanel()`**

    ```php
    public function canAccessPanel(): bool
    {
        return $this->hasRole('Admin') || $this->is_super_admin;
    }
    ```

    Taking this step ensures that only authorized users can access the admin panel, reducing potential vulnerabilities in your application.

## Default Super-Admin Credentials

The default credentials for accessing the application as a super-admin are:

-   **Email**: `admin@example.com`
-   **Password**: `123456`

By default, you can access the admin panel at [http://localhost/admin](http://localhost/admin). Ensure your local server is running, and the necessary configurations in your `.env` file are correctly set up to avoid access issues.

## Notes

This template is designed with love ❤️ to provide a robust starting point for Laravel applications built with Filament Admin. It includes pre-installed packages and essential configurations to reduce setup time and enhance productivity.

Feel free to customize and extend it as needed for your projects.

## Acknowledgments

I would like to express my gratitude to [**Laravel**](https://laravel.com) and [**Filament**](https://filamentphp.com) for their invaluable contributions to the community and their continuous effort in advancing the ecosystem. Their work has made web development more efficient and enjoyable.

I would also like to thank my family for their patience and understanding during the many hours I spend working on development. Their support means the world to me.

Thank you all!
