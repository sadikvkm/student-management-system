<?php

namespace App\Models;

use App\Traits\ModelQueryHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use HasFactory, ModelQueryHelpers, SoftDeletes;

    protected $table = "subjects";
    protected $fillable = ['name', 'created_by'];
}
