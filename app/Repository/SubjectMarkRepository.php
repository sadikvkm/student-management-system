<?php

namespace App\Repository;

use App\Models\SubjectMarks;

class SubjectMarkRepository {
    
    public static function createData($markId, $subjectId, $marks) {

        $create = new SubjectMarks();
        $create->mark_id = $markId;
        $create->subject_id = $subjectId;
        $create->marks = $marks;
        $create->save();

        return $create;
    }
}