<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidosFormRequest extends FormRequest
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
            'idCliente' => 'required|exists:clientes,id',
            'dataPedido' => 'required|date|after:yesterday'
        ];
    }

    public function messages()
    {
        return [
            'idCliente.required' => 'O campo cliente é obrigatório.',
            'idCliente.exists' => 'O cliente não está cadastrado.',
            'dataPedido.required' => 'O campo data do pedido é obrigatório.',
            'dataPedido.after' => 'A data do pedido tem que ser maior ou igual a hoje.'
        ];
    }
}
