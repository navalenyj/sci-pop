<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:App\Models\User,email',
            'login' => 'required|min:3|max:50|alpha_dash|unique:App\Models\User,login',
            'avatar' => 'image',
            'password' => 'required|confirmed|min:8|max:255'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Еmail не должно быть пустым',
            'email.email' => 'Email передан в неверном фармате',
            'email.unique' => 'Email должен быть уникальным',
            'login.required' => 'Логин не должен быть пустым',
            'login.min' => 'Логин минимально должен иметь 3 символа',
            'login.max' => 'Логин максимально может быть 50 символов',
            'login.alpha_dash' => 'Логин - нельзя пробелы и еще какие то еврейские символы',
            'login.unique' => 'Логин должен быть уникальным',
            'avatar.image' => 'фото в неверном формате',
            'password.required' => 'Пароль необходимо заполнить',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен быть минимум 8 символов',
            'password.max' => 'Пароль большой как мой член!'
        ];
    }
}
