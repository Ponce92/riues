<?php

namespace App\Http\Requests\ProyectoInvestigacion;

use Illuminate\Foundation\Http\FormRequest;

class CrearRequest extends FormRequest
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
            'nombre'=>'required|min:8|max:150|string',
            'codigo'=>'max:45|min:6|nullable',
            'acronimo'=>'string|max:25|min:4',
            'tipoP'=>'required',
            'area'=>'required',
            'area-c'=>'string|required_if:area,"Otra area del concimiento"',
            'pais'=>'required',
            'estadoP'=>'required',
            'desc'=>'required',
            'monto'=>'numeric|required',
            'fi'=>'required',
            'ff'=>'required',
            'red'=>'string|min:6|max:100',
            'tipoRed'=>'required',
            'Obj'=>'required'
        ];
    }

    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }
}