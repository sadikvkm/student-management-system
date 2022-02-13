<?php

namespace App\Repository;

use App\Models\Subjects;

class SubjectRepository {

    public static function getById($id)
    {
        return Subjects::where('id', $id)->select('id', 'name', 'created_at')->first();
    }

    public static function getAllSubjects($select = ['id', 'name', 'created_at'])
    {
        return Subjects::active()->select($select)->get();
    }
}