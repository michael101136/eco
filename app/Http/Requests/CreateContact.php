<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContact extends FormRequest
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
            'name' => 'required',
            'nacionalidad' => 'required',
            'apellido' => 'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'nacionalidad' => 'Ingresar su nacionalidad',
            'name.required'=>'* Ingresar nombre',
            'apellido.required'=>'* Ingresar apellidos',
            'email.required'=>'* Ingresar email',
            'phone.required'=>'* Ingresar telefono',
            'message.required'=>'* Ingresar mensaje',
        ];
    }
}
