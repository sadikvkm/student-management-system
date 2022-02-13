<?php

namespace App\Repository;

use App\Models\Teachers;

class TeacherRepository {

    public static function getById($id)
    {
        return Teachers::where('id', $id)->select('id', 'name', 'email', 'created_at')->first();
    }

    public static function getAllTeachers($select = ['id', 'name', 'email', 'created_at'])
    {
        return Teachers::active()->select($select)->get();
    }
}