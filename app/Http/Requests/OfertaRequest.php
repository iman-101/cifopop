<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfertaRequest extends FormRequest
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
            'import'=>'required|numeric|min:0',
            'text'=>'required|min:3',
            
        ];
    }
    
    public function messages(){
        
        return [
            'import.min'=>'el import debe ser mayor o igual a cero',
            'text.min'=> 'El  texto debe tener tres caracteres o más '
        ];
        
        
        
    }
}
