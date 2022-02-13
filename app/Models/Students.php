<?php

namespace App\Models;

use App\Traits\ModelQueryHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory, ModelQueryHelpers, SoftDeletes;
    protected $table = "students";
    protected $fillable = ['name', 'email', 'dob', 'gender', 'created_by', 'assigned_teacher'];

    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teachers::class, 'assigned_teacher', 'id');
    }

    public function scopeAssignedTeacher($query)
    {
        $query->with([
            'teacher' => function ($query) {
                $query->select('id', 'name', 'email', 'created_at');
            },
        ]);
    }
    
}
