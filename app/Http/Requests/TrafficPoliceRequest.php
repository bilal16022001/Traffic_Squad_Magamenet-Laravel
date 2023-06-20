<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrafficPoliceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'Name' => 'required',
            'email' => 'required|email',
            'Phone' => 'required',
            'Address' => 'required',
            'password' => 'required',
        ];
    }
}
