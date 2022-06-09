<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'full_name' => 'required',
            'username' => 'required',
            'level' => 'required',
            'email' => request()->isMethod('post') ? 'unique:users|required|email' : 'required|email',
            'is_active' => 'required',
            'password' => request()->isMethod('post') ? 'required' : 'nullable', 'confirmed',
        ];
    }
}
