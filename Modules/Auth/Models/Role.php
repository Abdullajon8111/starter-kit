<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{

    protected $guarded = ['id'];
    public static function guards(): array
    {
        $guards = config('auth.guards');

        return array_keys($guards);
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function (self $model) {
            $model->guard_name = config('auth.defaults.guard');
        });

        self::updating(function (self $model) {
            $model->guard_name = config('auth.defaults.guard');;
        });
    }
}
