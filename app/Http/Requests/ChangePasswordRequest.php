<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_old'=>'required',
            'password'=>'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password_old.required'=>'Informe sua senha atual',
            'password.required'=>'Informe a nova senha',
            'password.string'=>'',
            'password.min'=>'Senha curta',
            'password.confirmed'=>'As senhas não conferem'
        ];
    }
}
