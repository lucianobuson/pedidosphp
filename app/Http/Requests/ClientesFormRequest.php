<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3',
            'email' => 'required|email|unique:clientes,email'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo :attribute precisa ter pelo menos três caracteres.',
            'email.required' => 'O campo :attribute é obrigatório.',
            'email.email' => 'O campo :attribute é inválido.',
            'email.unique' => 'O email já está cadastrado para outro cliente.'
        ];
    }
}
