<?php

namespace App\Services;
use Illuminate\Support\Str;


class ImageService{
    public function storeImage($uploadedFile, $disk = 'public', $name)
    {
        $folder = '\uploads\images\\';
        $file = $uploadedFile->storeAs($folder, $name, $disk);
        return $file;
    }
    public function uploadImage($request, $image_field_name){
        if($request->hasFile($image_field_name)){
            if($request->file($image_field_name)->isValid()){
                $image = $request->file($image_field_name);
                $image_title = Str::random(25) .'.' .$image->getClientOriginalExtension();
                $this->storeImage($image, 'public', $image_title);
                $request->cover_image_url = $image_title;
            }
        }
    }
}