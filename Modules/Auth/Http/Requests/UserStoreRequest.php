<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'confirmed'],
            'permissions' => ['array', 'nullable', Rule::exists('permissions', 'id')],
            'roles' => ['array', 'nullable', Rule::exists('roles', 'id')]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
