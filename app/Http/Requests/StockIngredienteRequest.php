<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StockIngredienteRequest extends Request
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
            'ingrediente_id' => 'required',
            'costo' => 'required',
            'cantidad' => 'required',
            'estado' => 'required',
            'estado' => 'required'
        ];
    }
}
