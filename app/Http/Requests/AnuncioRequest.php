<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnuncioRequest extends FormRequest
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
            'titulo'=>'required|min:3',
            'descripicion'=>'required|min:3',
            'precio'=>'required|numeric|min:0',
            'imagen'=>'sometimes|file|image|mimes:jpg,png,gif,webp|max:2048'
        ];
    }
    
    public function messages(){
        
        return [
            'titulo.min'=>'El titulo deber tener tres caracteres o más',
            'descripicion.min'=>'la descripción deber tener tres caracteres o más',
            'precio.numeric'=> 'El  precio debe ser un número',
            'precio.min'=> 'El  precio debe ser mayor o igual a cero',
            'imagen.image'=>'El fichero debe ser una imagen',
            'imagen.mines'=>'La imagen debe ser de tipo jpg,png,gif o webp.',
        ];
        
        
        
    }
}
