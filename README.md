[![Build Status](https://travis-ci.org/ultra-lite/composite-container.svg?branch=master)](https://travis-ci.org/ultra-lite/composite-container)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ultra-lite/composite-container/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ultra-lite/composite-container/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/ultra-lite/composite-container/v/stable)](https://packagist.org/packages/ultra-lite/composite-container)
[![MIT Licence](https://badges.frapsoft.com/os/mit/mit.svg?v=103)](https://opensource.org/licenses/mit-license.php)

# ![logo](https://avatars1.githubusercontent.com/u/16309098?v=3&s=100) Ultra-Lite Composite Container

This is an extremely lightweight Composite Container for use with the Delegate Lookup pattern.  It is PSR-11 compliant.

## Use

```php
$compositeContainer = new \UltraLite\CompositeContainer\CompositeContainer();
$compositeContainer->addContainer($container);
$compositeContainer->addContainer($anotherContainer);

if ($compositeContainer->has($serviceId) {
    $compositeContainer->get($serviceId);
}
```

## Installation

```bash
composer require ultra-lite/composite-container
```
