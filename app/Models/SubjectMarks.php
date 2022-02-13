<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectMarks extends Model
{
    use HasFactory;
    protected $table = "subject_marks";
    protected $fillable = ['mark_id', 'subject_id', 'marks', 'created_by'];
    public $timestamps = false;
}
