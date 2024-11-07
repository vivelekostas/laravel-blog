<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'nullable|string|email|unique:users',
            // 'password' => 'required|string',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо заполнить',
            'name.string' => 'Имя должно быть строковым типом данных',
            'email.required' => 'Это поле необходимо заполнить',
            'email.string' => 'Почта должно быть строковым типом данных',
            'email.email' => 'Ваша почта должна соответствовать формату mail@some.domain',
            'email.unique' => 'Пользователь с такой почтой уже существует',
            // 'password.required' => 'Это поле необходимо заполнить',
            // 'password.string' => 'Имя должно быть строковым типом данных',
            'role.required' => 'Это поле необходимо заполнить',
            'role.integer' => 'Id роли должен быть числовым значением',
        ];
    }
}
