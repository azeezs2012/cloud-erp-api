<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if($this->isMethod('POST')){
            return [
                'username' => 'required',
                'password' => 'required',
                'is_active' => 'required',
                'is_approved' => 'required'
            ];
        }
        else if($this->isMethod('PUT')){
            return [
                'username' => 'required',
                'password' => 'required',
                'is_active' => 'required',
                'is_approved' => 'required'
            ];
        }
        else{
            return [];
        }
    }
}
