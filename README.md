# ScreenlyClient

[![Build Status](https://travis-ci.org/stefanzweifel/ScreeenlyClient.svg)](https://travis-ci.org/stefanzweifel/ScreeenlyClient)<br>
[![Latest Stable Version](https://poser.pugx.org/wnx/screeenly-client/v/stable.svg)](https://packagist.org/packages/wnx/screeenly-client) [![Total Downloads](https://poser.pugx.org/wnx/screeenly-client/downloads.svg)](https://packagist.org/packages/wnx/screeenly-client) [![Latest Unstable Version](https://poser.pugx.org/wnx/screeenly-client/v/unstable.svg)](https://packagist.org/packages/wnx/screeenly-client) [![License](https://poser.pugx.org/wnx/screeenly-client/license.svg)](https://packagist.org/packages/wnx/screeenly-client)

PHP Wrapper for the [Screeenly API](http://screeenly.com). You must have a Screeenly account to use this package.
> Feedback is always welcome :)

## Installation

Install the package with composer:

```
$ composer require wnx/screeenly-client ~0.1
```

## Usage

### Laravel

Add the following code to your `providers` array in `app/conifg/app.php`:

```php
...

'Wnx\ScreeenlyClient\ScreeenlyClientServiceProvider',
```

Publish config file and enter you Screeenly API key in `config/packages/wnx/screeenly-client/config.php`

```bash
php artisan config:publish wnx/screeenly-client
```

```php
Screenshot::capture('http://google.com');
$localPath = Screenshot::store($path);
```

### Non-Laravel Usage

```php
use Wnx\ScreeenlyClient\Screenshot;
...

$screenshot = new Screenshot($key);
$screenshot->capture($url);
$localPath = $screenshot->store($path);
```

## Available Methods

### `capture($url)`

Create Screenshot of given URL.

### `store($path)`

Store screenshot on local disk. Returns path to image.

### `setHeight(integer)`

Optional. Set screenshot height.

### `setWidth(integer)`

Optional. Set screenshot width.

### `getPath()`

Return path to temporary image on Screeenly server.

### `getBase64()`

Return base64-string for screenshot.

## Bucket list

- Improve code structure
- Write tests

## License

MIT