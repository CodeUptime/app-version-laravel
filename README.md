[![Packagist](https://img.shields.io/packagist/v/codeuptime/app-version-laravel.svg)](https://packagist.org/packages/codeuptime/app-version-laravel) [![Test](https://github.com/CodeUptime/app-version-laravel/actions/workflows/test.yml/badge.svg?branch=main)](https://github.com/CodeUptime/app-version-laravel/actions/workflows/test.yml) 

# app-version-laravel

This package makes it easy to access current app version information if your Laravel application at runtime.

This can be helpful when you want/need to:
- inlcude app version number in logs
- include app version in API responses
- show the current app version to your users
- ...


## Pre-Requisites
This package relies on current version information being saved in the `composer.json` or `package.json` files under the `version` key.

If you are not currently setting the version of your application in any of these files as part of your CI/CD workflows, you can follow this tutorial to get started: [Automatic Version Tagging using Github Actions](https://medium.com/one-weekend-at-a-time/semantic-commit-messages-and-automatic-version-tagging-in-github-actions-184a82a7a827)

## Getting Started

### Installation
```
composer require codeuptime/app-version-laravel
```

### Configre App Service Provider
The package should be included in your application automatically using Laravel's package auto-discovery functionality. If this does not work, you can always add the service provider manually to your `config/app.php`

```php
/* 
 * Package Service Providers...
 */
\CodeUptime\AppVersionLaravel\ServiceProvider::class
```

### Usage
You can now get your application version 2 ways:

#### Get version via helper function
```php
version()
```

#### Get version via Facade
```php
\CodeUptime\AppVersionLaravel\Version::get()
```