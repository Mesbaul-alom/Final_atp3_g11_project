<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profileRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required|min:9|max:11',
            'adress' => 'required',
            'password'=> 'required|min:5',
            'image'=> 'required|mimes:jpeg,png,jpg,pdf'
            
        ];
    }

    public function messages(){
        return [
           
        ];
    }
}