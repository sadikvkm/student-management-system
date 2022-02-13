<?php

namespace App\Models;

use App\Traits\ModelQueryHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    use HasFactory, ModelQueryHelpers, SoftDeletes;
    protected $table = "teachers";
    protected $fillable = ['name', 'email', 'created_by'];
}
