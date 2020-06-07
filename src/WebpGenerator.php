<?php


namespace AhmadCahyana\WebpGenerator;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class WebpGenerator
{
    public static function make(Storage $image)
    {
        $driver = Config::get('webp-generator.default_driver');

        if ($driver === 'php-gd') {
            new Exception('Driver [' . $driver . '] is not supported.');
        } elseif ($driver === 'cwebp') {
            return (new Cwebp())->make($image);
        }

        throw new Exception('Driver [' . $driver . '] is not supported.');
    }
}
