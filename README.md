# Setting Up Laravel Project with Authentication and Role Management

## Installation Steps

1. Go to the `htdocs` folder in your XAMPP installation.
2. Write the following commands in the command prompt:

    ```bash
    composer create-project laravel/laravel example-app
    composer create-project --prefer-dist laravel/laravel newstartup "10.*"
    ```

3. Navigate to the newly created Laravel project:

    ```bash
    cd example-app
    ```

4. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

## Setting Up Database

1. Create a database using phpMyAdmin.
2. Connect the database by updating the `.env` file in the project folder.

## Installing Laravel Breeze for Authentication

1. Install Laravel Breeze using Composer:

    ```bash
    composer require laravel/breeze --dev
    ```

    or

    ```bash
    composer require laravel/breeze:*
    ```

2. Install Breeze:

    ```bash
    php artisan breeze:install
    ```

3. Choose Blade for the frontend scaffolding and enable preferences like dark mode.
4. Select `PHPUnit` or `Pest` for testing.

## Configuring Database Connection

Ensure that the `.env` file has the correct MySQL database connection details.

## Database Migrations

1. Add `role` and `status` fields to the `users` table in the migration files:

    ```php
    $table->enum('role', ['admin', 'user'])->default('user');
    $table->enum('status', ['active', 'inactive'])->default('active');
    ```

2. Run migrations to apply the changes:

    ```bash
    php artisan migrate
    ```

## Seeding Default User Data

1. Create a seeder for the `users` table:

    ```bash
    php artisan make:seeder UserTableSeeder
    ```
2. Now go to User folder in Models and make it 
    ```php
    protected $guarded = [];
    ```
3. Populate the `UserTableSeeder` with default users:

    ```php
    use Illuminate\Support\Facades\Hash;
    use DB;

    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
            ],
        ]);
    }
    ```
4.  In seeder folder and databaseSeeder file write this code 
    ```php
    $this->call(UserTableSeeder::class);
    ```
5. Seed the database with default users:

    ```bash
    php artisan migrate:fresh --seed
    ```

## Creating Controllers and Routes

1. Generate a new controller for the admin dashboard:

    ```bash
    php artisan make:controller AdminController
    ```

2. Define a route for the admin dashboard in `routes/web.php`:

    ```php
    use App\Http\Controllers\AdminController;

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    ```

3. Implement the `AdminDashboard` method in the `AdminController` & create folder and file named admin and admin_dashboard.blade.php:

    ```php
    public function AdminDashboard()
    {
        return view('admin.admin_dashboard');
    }
    ```
4. Now go to auth folder and change the authfile to 

```php
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $url = '';
        if ($request->user()->role == 'admin') {
            $url = '/admin/dashboard';
        } else if ($request->user()->role == 'user') {
            $url = '/dashboard';

        }
        return redirect()->intended($url);
    }
```
## Middleware for Admin Role Protection

1. Create a middleware to protect admin routes:

    ```bash
    php artisan make:middleware AdminRole
    ```

2. Register the middleware in `app/Http/Kernel.php`:

    ```php
    'roles' => \App\Http\Middleware\AdminRole::class,
    ```

3. Implement the `handle` method in `AdminRole` middleware to check for admin role:

    ```php
    use Closure;
    use Illuminate\Http\Request;

    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->role !== $role) {
            return redirect('dashboard');
        }

        return $next($request);
    }
    ```

4. Apply the middleware to admin routes in `routes/web.php`:

    ```php
    Route::middleware(['auth', 'roles:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    });
    ```

## Enhancing Login Functionality

1. Modify the login form to accept either email or name for login:

    Update the login form in `resources/views/auth/login.blade.php`:

    ```blade
    <div>
        <x-input-label for="email" :value="__('Email/Name')" />
        <x-text-input id="email" class="block mt-1 w-full" type="text" name="login" :value="old('email')" required autofocus autocomplete="username" />
    </div>
    ```

2. Update validation rules for login in `app/Http/Requests/LoginRequest.php`:

    ```php
    'login' => ['required', 'string'],
    ```

3. Modify the `authenticate` method in `app/Actions/AuthenticateUser.php` to handle email or name login:

    ```php
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();
        $user = User::where('email', $this->login)->orWhere('name', $this->login)->first();

        if (!$user || !Hash::check($this->password, $user->password)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'login' => trans('auth.failed'),
            ]);
        }

        Auth::login($user, $this->boolean('remember'));
        RateLimiter::clear($this->throttleKey());
    }
    ```

## Configuring Mail for Password Reset

Update `.env` with mail configuration settings:

```plaintext
MAIL_MAILER=smtp
MAIL_HOST=mailtrap
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="${APP_NAME}"
