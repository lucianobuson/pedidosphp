<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosFormRequest extends FormRequest
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
            'preco' => 'required|numeric|between:0.01,1000.00'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo :attribute precisa ter pelo menos três caracteres.',
            'preco.required' => 'O campo :attribute é obrigatório.',
            'preco.numeric' => 'O campo :attribute é inválido.',
            'preco.between' => 'O :attribute tem que estar entre 0,01 e 1000,00.'
        ];
    }
}
