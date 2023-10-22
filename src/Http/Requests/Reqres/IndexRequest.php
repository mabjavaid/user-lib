<?php

namespace MaabJavaid\UserLib\Http\Requests\Reqres;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pageNumber' => ['required', 'integer']
        ];
    }
}
