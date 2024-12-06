# Logger Package

A Laravel package for logging application events into a database table. This package provides an extensible model, a database migration, and helper methods for recording user and system actions in a structured and searchable format.

---

## Features

- **Action Logging**: Easily log predefined or custom actions with optional metadata.
- **User Relationships**: Track the user performing the action (`logged_in_user_id`) and any user related to the action (`related_to_user_id`).
- **Structured Data**: Store additional data as JSON for enhanced flexibility.
- **Predefined Actions**: Common actions like login, logout, user creation, and more are included.

---

## Installation

1. **Add the Package**  
    Clone or place the package in the `packages/MattYeend/Logger` directory of your Laravel project.

2. **Register the Package**  
    Add the following entry in your Laravel application's `composer.json`:

    ```
    "repositories": [
        {
            "type": "path",
            "url": "./packages/MattYeend/Logger"
        }
    ]
    ```

3. **Require teh package**
    Run the following command: `composer require MattYeend/logger`

4. **Run Migrations**
    Publish and run the migrations to create the `logger` table:
    `php artisan migrate`

## Usage
### Log an Action
Use the `Logger` model to log actions. The predefined constants simplify common actions:
```
use MattYeend\Logger\Models\Logger;

// Log a user login event
Logger::log(Logger::ACTION_LOGIN, ['ip' => request()->ip()], auth()->id());
```

### Log Custom Actions
You can log actions not predefined in the package:
`Logger::log(99, ['custom_key' => 'custom_value'], auth()->id(), $relatedUserId);`

### Model Relationships
Retrieve the user who performed the action or the user related to it:
```
$log = Logger::find(1);

// Logged-in user
$loggedInUser = $log->loggedInUser;

// Related user
$relatedUser = $log->relatedToUser;
```

## Predefined Actions
| Constant                   | Value | Description                |
|----------------------------|-------|----------------------------|
| `ACTION_LOGIN`             | 1     | User logged in             |
| `ACTION_LOGOUT`            | 2     | User logged out            |
| `ACTION_CREATE_USER`       | 3     | Created a new user         |
| `ACTION_UPDATE_USER`       | 4     | Updated a user             |
| `ACTION_DELETE_USER`       | 5     | Deleted a user             |
| `ACTION_SHOW_USER`         | 6     | Viewed a user profile      |
| `ACTION_WELCOME_EMAIL_SENT`| 7     | Sent a welcome email       |
| `ACTION_CONFIRM_PASSWORD`  | 8     | Confirmed password         |
| `ACTION_FORGOT_PASSWORD`   | 9     | Initiated password reset   |
| `ACTION_REGISTER_USER`     | 10    | Registered a new user      |
| `ACTION_RESET_PASSWORD`    | 11    | Reset password             |
| `ACTION_VERIFY_USER`       | 12    | Verified user email        |

## Customisation
### Modify Migrations
You can customize the `logger` table by editing the migration file located at:
`packages/MattYeend/Logger/src/Database/Migrations/2024_12_06_000000_create_logger_table.php.`

### Extend the Logger Model
Add additional functionality by extending the `Logger` model in your application.

### Troubleshooting
1. **Migration Not Found**
    Ensure the `LoggerServiceProvider` is loading migrations by verifying the path in: `src/LoggerServiceProvider.php`:
    `$this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');`

2. **Data Validation Issues**
    Ensure `data` passed to `Logger::log()` is either `null` or an array. Example:
    `Logger::log(Logger::ACTION_LOGIN, ['key' => 'value'], auth()->id());`

### License
This package is licensed under the MIT License.

### Contributing
Feel free to fork the repository and submit pull requests for improvements or new features!