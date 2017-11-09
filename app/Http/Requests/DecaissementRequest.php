<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DecaissementRequest extends FormRequest
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
          'date' => 'required',
          'type' => 'required',
          'ref' => 'required',
          'montant' => 'required',
          'designation' => 'required',
          'marche_id' => 'required',
        ];
    }
}
