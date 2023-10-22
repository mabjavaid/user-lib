<?php

namespace MaabJavaid\UserLib\Http\Requests\Reqres;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:80'],
            'job'  => ['required', 'string', 'min:2', 'max:80']
        ];
    }
}
