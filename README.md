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

### Installing
`composer require andreyors/dsn`

### Usage
```php
<?php

use \AndreyOrs\Dsn;

Dsn::parse(getenv('DATABASE_URL'));
```
