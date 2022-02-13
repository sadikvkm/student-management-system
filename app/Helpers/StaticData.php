<?php

namespace App\Helpers;

class StaticData {

    public static function gender($value = "") {

        $data = [
            1 => "Male",
            2 => "Female",
        ];

        if($value)
            return $data[$value];

        return $data;
    }

    public static function terms($value = "") {

        $data = [
            1 => "First Term",
            2 => "Second Term",
            3 => "Third Term",
        ];

        if($value)
            return $data[$value];

        return $data;
    }

}