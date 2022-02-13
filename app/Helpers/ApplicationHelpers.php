<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

function authDetails($field = "")
{
    $auth = authUser();
    if($field) return $auth[$field];
}

function authUser()
{
    if($auth = Auth::user()) return $auth;
    return $auth;
}

function authUserLogo()
{
    return asset('/images/no-user.jpg');
}

function crypt_encrypt($payload)
{
    return Crypt::encrypt($payload);
}

function crypt_decrypt($payload)
{
    return Crypt::decrypt($payload);
}

function appDateFormat($date)
{
    return date('M d, Y h:i A', strtotime($date));
}

function findObjectById($data, $id, $key, $value){

    foreach ( $data as $element ) {
        if ( $id == $element[$key] ) {
            if($value) return $element[$value];
            return $element;
        }
    }

    return false;
}

function successResponse($result = [], $message = "success", $code = 200)
{
    return response()->json([
        'status' => true,
        'result' => $result,
        'message' => $message,
    ], $code);
}

function errorResponse($error = [], $message = "error", $code = 404)
{
    return response()->json([
        'status' => false,
        'error' => $error,
        'message' => $message,
    ], $code);
}