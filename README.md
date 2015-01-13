# ScreenlyClient

PHP Wrapper for the [Screeenly API](http://screeenly.com). You must have a Screeenly account to use this package.
> Currently in an alpha state. Use with care.

## Installation

Install the package with composer:

```
$ composer require wnx/screeenly-client dev-master
```

## Usage

```php
use Wnx\ScreeenlyClient\Screenshot;
...

$screenshot = new Screenshot($key);
$screenshot->capture($url);
$localPath = $screenshot->store($path);
```

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

## ToDo

- Fix Laravel ServiceProvider
- Improve code structure
- Write tests

## License

MIT