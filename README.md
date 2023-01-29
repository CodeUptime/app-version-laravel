# app-version-laravel

[![Packagist](https://img.shields.io/packagist/v/codeuptime/app-version-laravel.svg)](https://packagist.org/packages/codeuptime/app-version-laravel) [![License](https://img.shields.io/packagist/l/codeuptime/app-version-laravel.svg)](https://packagist.org/packages/codeuptime/app-version-laravel) [![Test](https://github.com/CodeUptime/app-version-laravel/actions/workflows/test.yml/badge.svg?branch=main)](https://github.com/CodeUptime/app-version-laravel/actions/workflows/test.yml) 


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
// 'config/app.php'
<?php

'providers' => [
    // Other Service Providers

    \CodeUptime\AppVersionLaravel\ServiceProvider::class
],

```

### Usage
You can now get your application version 2 ways:

#### Get current version

```php
version() 
// = "1.6.0"

\CodeUptime\AppVersionLaravel\Version::current()
// = "1.6.0"
```

The current version logic checks the composer.json and package.json files for the `version` key in that order. As soon as a version value is found, that value is returned.

#### Get composer.json version
```php
\CodeUptime\AppVersionLaravel\Version::composer()
// = "1.2.0" from composer.json
```

#### Get package.json version
```php
\CodeUptime\AppVersionLaravel\Version::package()
// = "1.2.0" from package.json
```

#### Get version information from all files
```php
\CodeUptime\AppVersionLaravel\Version::info()
```

this one returns a \stdClass object containing all version information
```
{ 
    "composer": "1.2.0"
    "package": "1.2.0"
}
```

## Artisan Commands
There are cases where you would like to use the application version number in your scripts and automated workflows. This package provides two commands 

### version
This command just returns the current version string. This makes it very usable as part of your CI/CD scripts or adding this version to other build artifacts such as API docs.

```
php artisan version
1.6.0
```

### version:info
This command is helpful when evaluating automation or debugging

```
php artisan version:info
+----------+---------+
| Source   | Version |
+----------+---------+
| composer | 1.6.0   |
| package  | 1.6.0   |
+----------+---------+
```