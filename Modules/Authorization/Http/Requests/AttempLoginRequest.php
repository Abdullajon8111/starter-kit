<?php

namespace Modules\Authorization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttempLoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
