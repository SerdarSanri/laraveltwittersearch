# Laravel Twitter Search #
A bundle to display a list of tweets for a particular search term

## Installation ##

```bash
php artisan bundle:install laraveltwittersearch
```

In ``application/bundles.php`` add:

```php
'laraveltwittersearch' => array('auto' => true),
```

## Basic Usage ##

```php
$tw = new laravelTwitterSearch();
$posts = $tw->setTerm('laravel')->getList();

or 

$tw = new laravelTwitterSearch('laravel');
$posts = $tw->getList();
```