<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:100',
            'email'=>'required|email|max:120|unique:users',
            'username'=>'required|max:20|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Informe o nome do Administrador',
            'name.min'=>'Nome curto demais',
            'name.max'=>'Nome longo demais',
            'email.required'=>'Informe o email',
            'email.email'=>'Email inválido',
            'email.max'=>'Email longo demais',
            'email.unique'=>'Email já registrado',
            'username.required'=>'Informe o username',
            'username.max'=>'Username longo demais',
            'username.unique'=>'Username já em uso'
        ];
    }
}
