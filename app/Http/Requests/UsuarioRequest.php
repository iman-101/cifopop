<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'poblacion'=>'required|max:16',
            'name'=>'required|min:3',
            'email'=>'required',
        ];
    }
    
    public function messages(){
        
        return [
            'poblacion.min'=>'la poblacion deber tener tres caracteres o más',
            'name.min'=>'el nombre deber tener tres caracteres o más',
            'email.required'=> 'El  email es obligatorio',
         
        ];
        
        
        
    }
}
