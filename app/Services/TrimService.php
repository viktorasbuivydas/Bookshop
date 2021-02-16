<?php

namespace App\Services;


class TrimService{
    public function getArrayFromStringInput($input){
        $string = $input;
        $full_array = explode(',', $string);
        $array = [];
        foreach($full_array as $element){
            if(!empty($element))
            array_push($array, ltrim(rtrim($element)));
        }
        return $array;
    }
}