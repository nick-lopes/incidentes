<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenteFormRequest extends FormRequest
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
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:3',
            'criticidade' => 'required',
            'tipo' => 'required',
            'status' => 'required'
        ];
    }
    
    public function messages() {
        
        return [
            'required' => "Campo ':attribute' é obrigatório",
            'titulo.min' => "Nome deve conter pelo menos 3 caractéres",
            'descricao.min' => "'Descrição' deve conter pelo menos 3 caractéres"
        ];
        
    }
}
