<?php

namespace App\Models;

use App\Traits\ModelQueryHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marks extends Model
{
    use HasFactory, ModelQueryHelpers, SoftDeletes;
    protected $table = "marks";
    protected $fillable = ['student_id', 'terms', 'created_by'];

    public function student_details()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function scopeStudent($query)
    {
        $query->with([
            'student_details' => function($query) {
                $query->select('id', 'name');
            }
        ]);
    }

    public function marks()
    {
        return $this->hasMany(SubjectMarks::class, 'mark_id', 'id');
    }

    public function scopeSubjectMarks($query)
    {
        $query->with([
            'marks' => function($query) {
                $query->select('id', 'mark_id', 'subject_id', 'marks');
            }
        ]);
    }
}
