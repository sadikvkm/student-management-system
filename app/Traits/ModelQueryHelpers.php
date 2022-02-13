<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait ModelQueryHelpers {

    public function added_by()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function scopeCreatedBy($query)
    {
        $query->with([
            'added_by' => function ($q) {
                $q->select('id', 'name');
            }
        ]);
    }

    public function scopeActive($query)
    {
        $query->where('status', 1);
    }
}
