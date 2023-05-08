<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function guards(): array
    {
        $guards = config('auth.guards');

        return array_keys($guards);
    }
}
