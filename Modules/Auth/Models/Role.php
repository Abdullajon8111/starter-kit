<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    public static function guards(): array
    {
        $guards = config('auth.guards');

        return array_keys($guards);
    }
}
