# Phprest Validator Service

[![Author](http://img.shields.io/badge/author-@adammbalogh-blue.svg?style=flat-square)](https://twitter.com/adammbalogh)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)

# Description

Validator Service which uses the [Symfony\Validator](https://github.com/symfony/Validator) component.

# Installation

Install it through composer.

```json
{
    "require": {
        "phprest/phprest-service-validator": "@stable"
    }
}
```

**tip:** you should browse the [`phprest/phprest-service-validator`](https://packagist.org/packages/phprest/phprest-service-validator)
page to choose a stable version to use, avoid the `@stable` meta constraint.

# Usage

## Registration

```php
use Phprest\Service\Validator;
# ...
/** @var \Phprest\Application $app */

$app->registerService(new Validator\Service(), new Validator\Config());
# ...
```

## Configuration

For the configuration you should check the [Config](src/Config.php) class.

## Reaching from a Controller

To reach your Service from a Controller you should use the Service's [Getter](src/Getter.php) Trait.

```php
<?php namespace App\Module\Controller;

use Phprest\Service;

class Index extends \Phprest\Util\Controller
{
    use Service\Validator\Getter;

    public function post(Request $request)
    {
        $this->serviceValidator()->validate(...);
    }
}
```

## Utils

Most of the Services in Phprest provides some utility mechanism (helper functions).

For the utilities you should check the [Util](src/Util.php) class.





