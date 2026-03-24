<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'originalUrl'  => ['required', 'url', 'max:2048', 'regex:/^https?:\/\//i'],
            'customCode'   => ['nullable', 'string', 'min:3', 'max:30', 'alpha_num', 'unique:encurtadordeurls,code'],
        ];
    }

    public function messages(): array
    {
        return [
            'customCode.unique'     => 'Este código já está em uso. Escolha outro.',
            'customCode.alpha_num'  => 'O código deve conter apenas letras e números.',
            'customCode.min'        => 'O código deve ter no mínimo 3 caracteres.',
            'customCode.max'        => 'O código deve ter no máximo 30 caracteres.',
        ];
    }
}
