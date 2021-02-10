<?php

namespace App\Services;


class ImageService{
    public function uploadOne($uploadedFile, $folder = null, $disk = 'public', $name)
    {
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}