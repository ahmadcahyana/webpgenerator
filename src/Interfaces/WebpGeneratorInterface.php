<?php


namespace yanaberkarya\webpgenerator\Interfaces;


use Illuminate\Support\Facades\Storage;

interface WebpGeneratorInterface
{
    /**
     * @param Storage $image
     * @return mixed
     */
    public function make(Storage $image);

    /**
     * @param $quality
     * @return mixed
     */
    public function quality($quality);

    /**
     * @param string $outputPath
     * @param int|null $quality
     * @return bool
     */
    public function save(string $outputPath, int $quality = null): bool;
}
