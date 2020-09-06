<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItensFormRequest extends FormRequest
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
            'idProduto' => 'required|exists:produtos,id',
            'quantidade' => 'required|numeric|between:0.01,1000.00',
            'desconto' => 'numeric|between:0.00,100.00'
        ];
    }

    public function messages()
    {
        return [
            'idProduto.required' => 'O campo código do produto é obrigatório.',
            'idProduto.exists' => 'O produto não está cadastrado.',
            'quantidade.required' => 'O campo quantidade é obrigatório.',
            'quantidade.numeric' => 'O campo quantidade é inválido.',
            'quantidade.between' => 'A quantidade tem que estar entre 0,01 e 1000,00.',
            'desconto.numeric' => 'O campo desconto é inválido.',
            'desconto.between' => 'O desconto tem que estar entre 0.00 e 100.00.'
        ];
    }
}
