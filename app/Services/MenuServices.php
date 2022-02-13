<?php

namespace App\Services;

use App\Models\Subjects;

class MenuServices {

    public static function sideMenu()
    {
        $menu = [

            [
                "id" => 1,
                "label" => "Dashboard",
                "icon" => "fas fa-tachometer-alt",
                "url" => "/dashboard",
            ],
            [
                "id" => 2,
                "label" => "Subjects",
                "icon" => "fas fa-pager",
                "url" => "/subjects",
            ],
            [
                "id" => 3,
                "label" => "Teachers",
                "icon" => "fas fa-user-tie",
                "url" => "/teachers",
            ],
            [
                "id" => 4,
                "label" => "Students",
                "icon" => "fas fa-user-graduate",
                "url" => "/students",
            ],
            [
                "id" => 5,
                "label" => "Marks",
                "icon" => "fas fa-clipboard-check",
                "url" => "/marks",
            ]

        ];

        return $menu;
    }
}