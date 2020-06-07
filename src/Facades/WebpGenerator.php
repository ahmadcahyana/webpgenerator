<?php


namespace yanaberkarya\webpgenerator\Facades;


use Illuminate\Support\Facades\Facade;

class WebpGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'webp';
    }
}
