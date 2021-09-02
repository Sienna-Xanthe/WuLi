<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Completion2Request extends FormRequest
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
            
        ];
    }

    protected function failedValidation(Validator $validator){
        
        throw(new HttpResponseException(json_fail('参数错误',$validator->errors()->all(),422)));
    }
}
