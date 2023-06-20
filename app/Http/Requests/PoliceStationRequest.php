<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoliceStationRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NameStation' => 'required',
            'CodeStation' => 'required',
        ];
    }
}
