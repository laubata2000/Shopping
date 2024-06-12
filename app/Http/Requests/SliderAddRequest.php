<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255|min:10',
            'description' => 'required',
            'image_path' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên slider không được phép để trống',
            'name.unique' => 'Tên slider không được phép trùng',
            'name.max' => 'Tên slider không được quá 255 ký tự',
            'name.min' => 'Tên slider không được phép nhỏ hơn 10 ký tự',
            'description.required' => 'Mô tả không được để trống',
            'image_path.required' => 'Hình ảnh không được để trống',
        ];
    }
}
