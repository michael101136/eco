<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateViewTestimonial extends FormRequest
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
    { return [
        'name' => 'required',
        'email' => 'required',
        'nationality'=>'required',
        'message'=>'required',
        'img'=>'required',
        
        
       ];
    }
    public function messages()
    { 
        return [
            'name.required'=>'* Ingresar nombre',
            'email.required'=>'* Ingresar email',
            'nationality.required'=>'* Ingresar nacionalidad',
            'message.required'=>'* Ingresar mensaje',
            'img.required'=>'* Subir imagen',
        
       ];
    }
}
