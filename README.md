# ZF2 Bootstrap Helpers
By [James Stormes](http://www.stormes.net)

ZF2 Module for better support of Twitter Bootstrap

## Introduction
This module is intended for usage with a default directory structure of a [ZendSkeletonApplication](https://github.com/zendframework/ZendSkeletonApplication/).  It provides view helpers and support classes for the [Twitter Bootstrap](http://getbootstrap.com/) framework.

## Installation via Composer

### Steps 

#### 1. Add to composer.

```
sh ./composer.phar require jstormes/bootstrap
#when asked for a version, type "0.*".
```


#### 2. Add module to application config (/config/application.config.php)

```
   <?PHP
   //...
   'modules' => array(
        'JStormes\Bootstrap',
   ),
   //...
```

## Usage
