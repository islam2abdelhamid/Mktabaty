<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'name' => 'required',
            'username' => ['required ' , Rule::unique('users')->ignore(Auth::user())],
            'email' => ['required' , 'email', Rule::unique('users')->ignore(Auth::user())],
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'image' => 'image|mimes:jpeg,png,jpg,svg',
        ];
    }
}
