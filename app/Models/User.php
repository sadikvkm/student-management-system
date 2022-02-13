<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subjects()
    {
        return $this->hasMany(\App\Models\Subjects::class, 'created_by');
    }

    public function teachers()
    {
        return $this->hasMany(\App\Models\Teachers::class, 'created_by');
    }

    public function students()
    {
        return $this->hasMany(\App\Models\Students::class, 'created_by');
    }

    public function marks()
    {
        return $this->hasMany(\App\Models\Marks::class, 'created_by');
    }
}
