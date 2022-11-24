<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ImageUploaderService
{
    public function uploadSingle(UploadedFile $uploadedFile, $folder = null, $filename = null, $disk = 'upload_disk')
    {
        $name = $filename ?? uniqid('img-');

        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
