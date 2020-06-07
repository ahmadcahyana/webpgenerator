<?php


namespace yanaberkarya\webpgenerator;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use yanaberkarya\webpgenerator\Interfaces\WebpGeneratorInterface;
use yanaberkarya\webpgenerator\Traits\WebpGeneratorTrait;

class Cwebp implements WebpGeneratorInterface
{
    use WebpGeneratorTrait;
    protected $cwebpPath;
    public function __construct()
    {
        $this->cwebpPath = Config::get('webp-generator.drivers.cwebp.path');
    }

    public function save(string $outputPath, int $quality = null): bool
    {
        $quality = $quality ?? $this->quality;
        $cmd = $this->cwebpPath . ' -q ' . $quality . ' ' . $this->image->getPathname() . ' -o ' . $outputPath;

        exec($cmd, $output, $exitCode);

        if ($exitCode !== 0) {
            throw new CwebpShellExecutionFailed(
                'Image conversion to WebP using cwebp failed with error code ' . $exitCode . ".\n"
                . "This command was used to execute cwebp: \n"
                . "  " . $cmd . "\n"
                . (
                count($output) ?
                    "The following output was sent to stdout: \n  " . join("\n  ", $output) :
                    "No output was sent to stdout"
                ),
                $exitCode
            );
        }

        return File::exists($outputPath);
    }
}
