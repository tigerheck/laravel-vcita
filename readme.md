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

## Examples

Get clients
```
$response = \Http::vcita()->get("/platform/v1/clients", [
    'search_term' => $email,
    'search_by' => 'email',
]);
```

Create a Client
```
$response = \Http::vcita()->post("/platform/v1/clients", [
    'address'           => $address,
    'custom_field1'     => $custom_field1,
    'custom_field2'     => $custom_field2,
    'custom_field3'     => $custom_field3,
    'email'             => $email,
    'first_name'        => $first_name,
    'last_name'         => $last_name,
    'phone'             => $phone,
    'source_campaign'   => $source_campaign,
    'source_channel'    => $source_channel,
    'source_name'       => $source_name,
    'source_url'        => $source_url,
    'staff_id'          => $staff_id,
    'status'            => $status,
    'tags'              => $tags,
]);
```

Updates a Client
```
$response = \Http::vcita()->put("/platform/v1/clients/{$client_id}", [
    'address'           => $address,
    'custom_field1'     => $custom_field1,
    'custom_field2'     => $custom_field2,
    'custom_field3'     => $custom_field3,
    'email'             => $email,
    'first_name'        => $first_name,
    'last_name'         => $last_name,
    'phone'             => $phone,
    'source_campaign'   => $source_campaign,
    'source_channel'    => $source_channel,
    'source_name'       => $source_name,
    'source_url'        => $source_url,
    'staff_id'          => $staff_id,
    'status'            => $status,
    'tags'              => $tags,
]);
```

Deletes a Client by Id
```
$response = \Http::vcita()->delete("/platform/v1/clients/{$client_id}");
```

Retrieves a Client by Id
```
$response = \Http::vcita()->get("/platform/v1/clients/{$client_id}");
```