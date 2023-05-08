<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Auth\Models\Permission;

class PermissionUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'guard' => [
                'required',
                Rule::in(Permission::guards())
            ]
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
