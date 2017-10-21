## About

This package is an extension on top of [Spatie laravel-html](https://github.com/spatie/laravel-html) package to easily produce font awesome markup.

## Installation

You can install the package via composer:

``` bash
composer require spatie/laravel-html
```

If you are using Laravel 5.5, the service provider and facade will automatically be discovered. 

On earlier versions, you need to do that manually.

You must install the service provider:

```php
// config/app.php
'providers' => [
    ...
    MarvinLabs\Html\FontAwesome\FontAwesomeServiceProvider::class,
];
```

And optionally register an alias for the facade.

```php
// config/app.php
'aliases' => [
    ...
    'FA' => MarvinLabs\Html\FontAwesome\Facades\FontAwesome::class,
];
```

## Usage

### Icons

Here are two equivalent ways to output the beer icon. The first one allows full auto-completion. While the second one 
uses a little magic to automatically transform the method name into the icon name.

    {!! fa()->icon('beer') !!}
    {!! fa()->beer() !!}
    
When the icon name contains dashes (aka *kebab case*), you should use the *camel case* equivalent (remove dashes, and 
capitalize each word after the first one).      
    
    {!! fa()->icon('window-close') !!}
    {!! fa()->windowClose() !!}

### Modifiers

You can chain methods to affect the icon.

    {!! fa()->icon('repeat')->spin()->size('2x') !!}

### Stacks

You can also produce icon stacks (two icons on top of each other).

The `stack` method should receive an array containing exactly two items. The items can be associative or not.

If you pass simple strings, those are considered to be the icon name.

    {!! fa()->stack([ 'square-o', 'beer', ]) !!}
    
If the item is a `key => value` association, the key is considered to be the icon name, and the value will be the 
CSS classes added to the icon element.
    
    {!! fa()->stack([ 'square', 'beer' => 'fa-inverse', ]) !!}
    
An item can also simply be created as described above by chaining methods.     
    
    {!! fa()->stack([ 'square', fa()->icon('beer')->inverse()->flip(), ]) !!}
    
Finally, you can also add any CSS class to the stack, like the ones for sizing (refer to the Font Awesome documentation).         

    {!! fa()->stack([ 'square-o', 'beer', ])->addClass('fa-5x') !!}
    
Output the latest minified Font Awesome CSS link using the maxCDN URL     
    
    {!! fa()->css() !!}
   
   