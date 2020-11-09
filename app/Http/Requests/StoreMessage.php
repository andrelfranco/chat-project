<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessage extends FormRequest
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
            'contact_id' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'contact_id.required' => 'É necessário inserir o remetente',
            'message.required' => 'A mensagem está vazia',
        ];
    }
}
