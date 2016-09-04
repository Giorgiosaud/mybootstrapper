# Bootstrapper

Latest stable version: [![Latest Stable Version](https://poser.pugx.org/patricktalmadge/bootstrapper/v/stable.svg)](https://packagist.org/packages/patricktalmadge/bootstrapper)

Travis status : [![Build Status](https://travis-ci.org/patricktalmadge/bootstrapper.svg?branch=develop)](https://travis-ci.org/patricktalmadge/bootstrapper)

Current supported Bootstrap version: 3.2.0

Bootstrapper is a set of classes that allow you to quickly create Twitter 
Bootstrap 3 style markup.

## Installation

Add the following to your `composer.json` file :

```json
"require": {
    "giorgiosaud/bootstrapper": "~5",
},
```

Then register Bootstrapper's service provider with Laravel:

```php
'Giorgiosaud\Bootstrapper\BootstrapperServiceProvider',
```

If you are using Laravel 5, then you should instead use the Laravel 5 service
provider.

```php
'Giorgiosaud\Bootstrapper\BootstrapperL5ServiceProvider',
```

You can then (if you want to) add the following aliases to your `aliases` 
array in your `config/app.php` file.

```php
'Accordion' => 'Giorgiosaud\Bootstrapper\Facades\Accordion',
'Alert' => 'Giorgiosaud\Bootstrapper\Facades\Alert',
'Badge' => 'Giorgiosaud\Bootstrapper\Facades\Badge',
'Breadcrumb' => 'Giorgiosaud\Bootstrapper\Facades\Breadcrumb',
'Button' => 'Giorgiosaud\Bootstrapper\Facades\Button',
'ButtonGroup' => 'Giorgiosaud\Bootstrapper\Facades\ButtonGroup',
'Carousel' => 'Giorgiosaud\Bootstrapper\Facades\Carousel',
'ControlGroup' => 'Giorgiosaud\Bootstrapper\Facades\ControlGroup',
'DropdownButton' => 'Giorgiosaud\Bootstrapper\Facades\DropdownButton',
'Form' => 'Giorgiosaud\Bootstrapper\Facades\Form',
'Helpers' => 'Giorgiosaud\Bootstrapper\Facades\Helpers',
'Icon' => 'Giorgiosaud\Bootstrapper\Facades\Icon',
'InputGroup' => 'Giorgiosaud\Bootstrapper\Facades\InputGroup',
'Image' => 'Giorgiosaud\Bootstrapper\Facades\Image',
'Label' => 'Giorgiosaud\Bootstrapper\Facades\Label',
'MediaObject' => 'Giorgiosaud\Bootstrapper\Facades\MediaObject',
'Modal' => 'Giorgiosaud\Bootstrapper\Facades\Modal',
'Navbar' => 'Giorgiosaud\Bootstrapper\Facades\Navbar',
'Navigation' => 'Giorgiosaud\Bootstrapper\Facades\Navigation',
'Panel' => 'Giorgiosaud\Bootstrapper\Facades\Panel',
'ProgressBar' => 'Giorgiosaud\Bootstrapper\Facades\ProgressBar',
'Tabbable' => 'Giorgiosaud\Bootstrapper\Facades\Tabbable',
'Table' => 'Giorgiosaud\Bootstrapper\Facades\Table',
'Thumbnail' => 'Giorgiosaud\Bootstrapper\Facades\Thumbnail',
```

## Including Bootstrap

Include the Bootstrap files just like any other css and js files! Download
Bootstrap and JQuery from the [Bootstrap site](http://getbootstrap.com),
place them in your public folder and then include them like so:

```php
{{ HTML::style('path/to/bootstrap.css') }}
{{ HTML::script('path/to/jquery.js') }}
{{ HTML::script('path/to/bootstrap.js') }}
```

Feel free to use a CDN, but bear in mind that you may get unexpected
functionality if the version you use isn't the version Bootstrapper currently
supports (but open an issue to let us know!).

```html
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
```

If you want to get the latest Bootstrap that Bootstrapper supports,
then use the helper function:

```php
Helpers::css()
Helpers::js()
```

If you want to stick at a certain version then use

```
artisan config:publish patricktalmadge/bootstrapper
```

And update your config file in app/config/packages.

We also have Twitter Bootstrap as a dependency, so you can grab the files from
your vendor directory.

## Documentation

- [Bootstrapper documentation](http://bootstrapper.eu1.frbit.net/)
- [Twitter Bootstrap documentation](http://getbootstrap.com/)
- [Twitter Bootstrap on Github](https://github.com/twitter/bootstrap)


## Contributing

Contributing is easy! Just fork the repo, make your changes then send a pull 
request on GitHub. If your PR is languishing in the queue and nothing seems 
to be happening, then send Patrick an 
[email](mailto:pjr0911025@googlemail.com) or a 
[tweet](http://twitter.com/DrugCrazed).
