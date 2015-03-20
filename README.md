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

NOTE: The Bootstrap CSS and JS files must be included in your layout for this module to be useful.

## Usage


### Boostrap Menu


#### In the *.config.php

To enable the Bootstrap styled menu

```
   'jstormes' => array(
        'bootstrap' => array(
            'menu' => array(
                'enabled' =>true,
            ),
        ),
    ),
```
(Optionally) enable the Zend navigation factory

```
  'service_manager' => array(
    'factories' => array(
       'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
    ),
  ),

```
(Optionally) specify the navigation structure

```
'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
            ),
            array(
                'label' => 'Page #1',
                'route' => 'home',
                'pages' => array(
                    array(
                        'label' => 'Child #1',
                        'route' => 'home',
                    ),
                ),
            ),
            array(
                'label' => 'Page #2',
                'route' => 'home',
            ),
        ),
    ),
```
In the layout, place the folling code where you want the menu:

```
  <ul class="nav navbar-nav">
      <?php echo $this->navigation('navigation')->menu()->render(); ?>
  </ul>
```

