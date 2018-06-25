# dsn

[![Latest Stable Version](https://poser.pugx.org/andreyors/dsn/v/stable)](https://packagist.org/packages/andreyors/dsn)
[![Build Status](https://travis-ci.org/andreyors/dsn.svg?branch=master)](https://travis-ci.org/andreyors/dsn)
[![Downloads](https://poser.pugx.org/andreyors/dsn/downloads)](https://packagist.org/packages/andreyors/dsn)
[![codecov](https://codecov.io/gh/andreyors/dsn/branch/master/graph/badge.svg)](https://codecov.io/gh/andreyors/dsn)
![Deps](https://img.shields.io/badge/dependencies-up%20to%20date-brightgreen.svg)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![M score](https://api.codeclimate.com/v1/badges/159fabcb277903962edb/maintainability)](https://codeclimate.com/github/andreyors/dsn/maintainability)
[![PHP 7 ready](http://php7ready.timesplinter.ch/andreyors/dsn/badge.svg)](https://travis-ci.org/andreyors/dsn)

A DSN Parser for 12 factor apps

## Getting started

### Prerequisites
  - Composer
  
### Supported
- MySQL DSN
- PostgreSQL DSN
- Redis DSN

### Installing
`composer require andreyors/dsn`

### Usage
```php
<?php

if (!isset($_ENV['APP_ENV'])) { // Production must have env vars provided via /etc/environment
    (new Symfony\Component\Dotenv\Dotenv())
        ->load(__DIR__ . '/.env');
}

$dsn = \AndreyOrs\Dsn::parse($_ENV['SYNCAPP_URL']);

return [
    'migration_dirs' => [
        'migrations' => __DIR__.'/config/db/migrations',
    ],
    'environments' => [
        'local' => [
            'adapter' => $dsn['adapter'] ?? '',
            'host' => $dsn['host'] ?? '',
            'username' => $dsn['user'] ?? '',
            'password' => $dsn['pass'] ?? '',
            'db_name' => $dsn['name'] ?? '',
            'charset' => 'utf8mb4',
        ],
    ],
];
```

### Tests
```sh
composer test
```

### License
This library is released under the MIT license.

### More resources
- [The 12 Factor App](https://www.12factor.net/)
- [Environment Variables](https://help.ubuntu.com/community/EnvironmentVariables)

