<h1 align="center"> weather </h1>

<p align="center"> 一款基于高德地图的天气SDK</p>


## Installing

```shell
$ composer require dancelynx/weather -vvv
```

## Usage

注册到app中的providers里面
```php
DanceLynx\Weather\ServiceProvider::class,
```
在config/services.php里添加如下配置:
```php
'weather'=>[
	'key'=>env("WEATHER_API"),
],
```
然后在.env文件中添加
```php
WEATHER_API=xxxxxx
```
在代码里可以这样用:
```php
Route::get('/', function () {
   $result = app('weather')->getWeather('西宁','all');
   return response()->json($result);
});

```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/dancelynx/weather/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/dancelynx/weather/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
