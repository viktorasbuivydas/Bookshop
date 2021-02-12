<?php

namespace App\Services;


class ImageService{
    public function uploadOne($uploadedFile, $disk = 'public', $name)
    {
        $folder = '\uploads\images\\';
        $file = $uploadedFile->storeAs($folder, $name, $disk);

        return $file;
    }
}