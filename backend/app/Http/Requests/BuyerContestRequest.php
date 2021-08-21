<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerContestRequest extends FormRequest
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
            //
            // 'username' => 'required',
    	    // 'password'=> 'required|min:5'
            'title' => 'required',
    	    'contest_file'=> 'required|mimes:jpeg,png,jpg,pdf',
            'price'=>'required',
            'time'=>'required',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        return 
        [
          'title.required' => 'title Required.....',
          'price.required' => 'Price required....',
          'time.required' => 'Date time required', 
          'description.required'=> 'description required', 
        ];
    }
}
