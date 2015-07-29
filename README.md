# ScreenlyClient

[![Build Status](https://travis-ci.org/stefanzweifel/ScreeenlyClient.svg)](https://travis-ci.org/stefanzweifel/ScreeenlyClient)<br>
[![Latest Stable Version](https://poser.pugx.org/wnx/screeenly-client/v/stable.svg)](https://packagist.org/packages/wnx/screeenly-client) [![Total Downloads](https://poser.pugx.org/wnx/screeenly-client/downloads.svg)](https://packagist.org/packages/wnx/screeenly-client) [![Latest Unstable Version](https://poser.pugx.org/wnx/screeenly-client/v/unstable.svg)](https://packagist.org/packages/wnx/screeenly-client) [![License](https://poser.pugx.org/wnx/screeenly-client/license.svg)](https://packagist.org/packages/wnx/screeenly-client)

PHP Wrapper for the [Screeenly API](http://screeenly.com). You must have a Screeenly account to use this package.
> Feedback is always appreciated :)

## Installation

Install the package with composer:

Guzzle v6:     
```
$ composer require wnx/screeenly-client~2.0
```

Guzzle v5:   
```
$ composer require wnx/screeenly-client~1.0
```

For Laravel 4 prjoects:   
```
$ composer require wnx/screeenly-client~0.3
```

## Usage

### Laravel 5 

> [Read more](https://github.com/stefanzweifel/ScreeenlyClient/tree/v0.3.0) for Laravel 4 usage.

Add the following code to your `providers` array in `app/conifg/app.php`:

```php
...

'Wnx\ScreeenlyClient\ScreeenlyClientServiceProvider',
```

Publish the configration file and add your Screeenly API Key in `config/screeenly_client.php`.

```bash
php artisan vendor:publish --provider="Wnx\ScreeenlyClient\ScreeenlyClientServiceProvider"
```

Now you have access to the Screenshot Facade. Use it like the example below:

```php
$path       = public_path('/');
$screenshot = Screenshot::capture('http://google.com');
$localPath  = $screenshot->store($path, 'screenshot.jpg');
```


### Non-Laravel Usage

```php
use Wnx\ScreeenlyClient\Screenshot;
...

$screenshot = new Screenshot($key);
$screenshot->capture('http://google.com');
$localPath = $screenshot->store('path/to/image/store/', 'screenshot.jpg');
```

## Available Methods

### `$screeenshot->capture($url);`

Create Screenshot of given URL.

### `$screeenshot->store($path, $filename);`

Store screenshot on local disk. Returns path to image.

### `$screeenshot->setHeight(integer);`

Optional. Set screenshot height.

### `$screeenshot->setWidth(integer);`

Optional. Set screenshot width.

### `$screeenshot->getPath();`

Return path to temporary image on Screeenly server.

### `$screeenshot->getBase64();`

Return base64-string for screenshot.

## License

MIT
