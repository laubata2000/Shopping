<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            //
            'name' => 'required|unique:users|max:255|min:3',
            'email' => 'required',
            'password' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên người dùng không được phép để trống',
            'name.unique' => 'Tên người dùng không được phép trùng',
            'name.max' => 'Tên người dùng không được quá 255 ký tự',
            'name.min' => 'Tên người dùng không được phép nhỏ hơn 10 ký tự',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Password không được để trống',
        ];
    }
}
