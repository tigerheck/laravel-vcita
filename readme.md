# Laravel vCita Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tigerheck/laravel-vcita.svg?style=flat-square)](https://packagist.org/packages/tigerheck/laravel-vcita)
[![Total Downloads](https://img.shields.io/packagist/dt/tigerheck/laravel-vcita.svg?style=flat-square)](https://packagist.org/packages/tigerheck/laravel-vcita)


**A Laravel wrapper for vCita API.**

## Install

Via Composer

``` bash
$ composer require tigerheck/laravel-vcita
```


## Configuration

Laravel vCita requires connection configuration. To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="TigerHeck\Vcita\VcitaServiceProvider"
```

Add `VCITA_BASE_URL=` and `VCITA_API_KEY=` to your enviroment configuraiton file


## Usage
See documention for params and others at [vCita docs](https://developers.vcita.com/reference)
