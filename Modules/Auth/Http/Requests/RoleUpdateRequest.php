<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Auth\Models\Role;

class RoleUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'guard' => ['required', Rule::in(Role::guards())],
            'permissions' => ['array', 'nullable']
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
