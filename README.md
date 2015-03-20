# ZF2 Bootstrap Helpers
By [James Stormes](http://www.stormes.net)

ZF2 Module for better support of Twitter Bootstrap

## Table of Contents
1. [Introduction](#introduction)
2. [Installation via Composer](#installation-via-composer)
3. [Usage](#usage)
   * [Boostrap Navbar](#boostrap-navbar)

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


### Boostrap Navbar
The menu code in this module produces a very generic Bootstrap styled menu (\<ul\>/\<li\> tags) for the [Navbar](http://getbootstrap.com/components/#navbar).


#### In the *.config.php

To enable the Bootstrap styled menu

```
	//...
   'jstormes' => array(
        'bootstrap' => array(
            'menu' => array(
                'enabled' =>true,
            ),
        ),
    ),
    //...
```
(Optionally) enable the Zend navigation factory

```
  //...
  'service_manager' => array(
    'factories' => array(
       'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
    ),
  ),
  //...

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
                'label' => 'Submenu',
                'route' => 'application',
                'pages' => array(
                    array(
                        'label'      => 'Item 1',
                        'route'      => 'application/default',
                        'controller' => 'index',
                        'action'     => 'item1'
                    ),
                    array(
                        'label'      => 'Item 2',
                        'route'      => 'application/default',
                        'controller' => 'index',
                        'action'     => 'item2'
                    ),
                ),
            ),
            'pages' =>array(
                'label' => 'Page #2',
                'route' => 'application/default',
                'controller' => 'page2',
                'action' => 'index'
            ),
        ),
    ),
    //...
```
#### In the layout
Place the following where the menu should appear.

```
  <!-- ... -->
  <ul class="nav navbar-nav">
      <?php echo $this->navigation('navigation')->menu()->render(); ?>
  </ul>
  <!-- ... -->
```

In the `Setup/Sample_Layouts` there is a sample of the navigation in a stock ZF2 Skeleton layout.

