<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTours extends FormRequest
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
            'name'=>'required',
            'description_corta'=>'required',
            'description_completa'=>'required',
            'textOrganizacion'=>'required',            
            'precio'=>'required|integer',
        ];
    }
    public function messages()
    {
       return [
          'name.required' => 'Ingresar nombre de tour',
          'description_corta.required' => 'Ingresar descripción corta del tour',
          'description_completa.required' => 'Ingresar descripción completa del tour',
          'textOrganizacion.required' => 'Ingresar su organización',
          'precio.required' => 'Ingresar precio'
       ];
    }
}
