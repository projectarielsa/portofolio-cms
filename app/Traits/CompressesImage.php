<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait CompressesImage
{
    /**
     * Kompres dan convert gambar ke WebP secara proporsional.
     */
    protected function compressAndSaveImage(
        UploadedFile $file,
        string $destinationDir,
        int $maxDimension = 1200,
        int $quality = 80
    ): string {
        $realPath = $file->getRealPath();
        $mime = $file->getMimeType();

        $image = match ($mime) {
            'image/jpeg', 'image/jpg' => @imagecreatefromjpeg($realPath),
            'image/png' => @imagecreatefrompng($realPath),
            'image/webp' => @imagecreatefromwebp($realPath),
            'image/gif' => @imagecreatefromgif($realPath),
            default => null,
        };

        if (!$image) {
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($destinationDir), $filename);
            return $destinationDir . '/' . $filename;
        }

        // Koreksi orientasi EXIF (kamera smartphone)
        if (function_exists('exif_read_data') && in_array($mime, ['image/jpeg', 'image/jpg'])) {
            $exif = @exif_read_data($realPath);
            if (!empty($exif['Orientation'])) {
                $image = match ($exif['Orientation']) {
                    3 => imagerotate($image, 180, 0),
                    6 => imagerotate($image, -90, 0),
                    8 => imagerotate($image, 90, 0),
                    default => $image,
                };
            }
        }

        $width = imagesx($image);
        $height = imagesy($image);

        if ($width > $maxDimension || $height > $maxDimension) {
            if ($width > $height) {
                $newWidth = $maxDimension;
                $newHeight = (int) round(($height / $width) * $maxDimension);
            } else {
                $newHeight = $maxDimension;
                $newWidth = (int) round(($width / $height) * $maxDimension);
            }

            $canvas = imagecreatetruecolor($newWidth, $newHeight);
            imagealphablending($canvas, false);
            imagesavealpha($canvas, true);
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($image);
            $image = $canvas;
        }

        $targetDir = public_path($destinationDir);
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.webp';
        $targetPath = $targetDir . '/' . $filename;

        imagewebp($image, $targetPath, $quality);
        imagedestroy($image);

        return $destinationDir . '/' . $filename;
    }
}
