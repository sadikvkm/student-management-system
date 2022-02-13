<?php

namespace App\Helpers;

class DataTableHelper {

    public static function showLink($id, $label, $route)
    {
        return '<i data-feather="link"></i> <a class="link text-capitalize" href="' . route($route  . '.show', crypt_encrypt($id) ) . '"><b>' . $label . '</b></a>';
    }

    public static function status($status = "", $route)
    {

        $statusLabel = 'In-Active';
        $color = 'danger';
        if($status) {
            $statusLabel = 'Active';
            $color = 'success';
        }

        return '<div data-method="PUT" data-href="'.$route.'" class="change-table-status mouse badge badge-'.$color.'">'.__($statusLabel).'</div>';
    }

    public static function actions($id, $route, $disableAction =[], $actionPageType = "")
    {
        $edit = "";
        $delete = "";

        if(! in_array('delete', $disableAction)){
            $delete = '<span data-method="DELETE" data-href="'.route($route . '.destroy', crypt_encrypt($id)). '" class="delete-action-confirm ms-1">
            <i class="fas fa-trash text-danger ml-3 mouse"></i></span>';
        }

        if(! in_array('edit', $disableAction)){
            if($actionPageType == 'on-page-edit')
                $edit = '<a href="'.route($route . '.edit', crypt_encrypt($id)). '" data-update="'.route($route . '.update', crypt_encrypt($id)).'" class="edit-datatable-data" href="#"><i class="fas fa-edit mouse"></i></a>';
            else
                $edit = '<a href="'.route($route . '.edit', crypt_encrypt($id)). '" class="" href="#"><i data-feather="edit"></i></a>';
        }

        return $edit . ' ' . $delete . ' ';
    }
}
