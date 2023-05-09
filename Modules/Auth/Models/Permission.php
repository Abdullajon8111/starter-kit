<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
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
            $model->guard_name = auth()->user()->getDefaultGuardName();
        });

        self::updating(function (self $model) {
            $model->guard_name = auth()->user()->getDefaultGuardName();
        });
    }
}
