<?php 

namespace App\Repository;

use App\Models\Students;

class StudentRepository {

    public static function getById($id)
    {
        return Students::where('id', $id)->select('id', 'name', 'email', 'dob', 'gender', 'assigned_teacher')->first();
    }

    public static function getAllStudents($select = ['id', 'name', 'created_at'])
    {
        return Students::active()->select($select)->get();
    }
}