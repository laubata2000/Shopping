<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không được quá 255 ký tự',
            'name.min' => 'Tên không được phép nhỏ hơn 10 ký tự',
            'price.required' => 'Giá không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'contents.required' => 'Nội dung không được để trống',
        ];
    }
}
