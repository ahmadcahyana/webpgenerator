<?php


namespace yanaberkarya\webpgenerator\Traits;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

trait WebpGeneratorTrait
{
    protected $image;
    protected $quality;
    public function make(Storage $image): self
    {
        $this->quality = Config::get('webp-generator.default_quality');
        $this->image = $image;

        return $this;
    }
    public function quality($quality): self
    {
        $this->quality = $quality;

        return $this;
    }
}
