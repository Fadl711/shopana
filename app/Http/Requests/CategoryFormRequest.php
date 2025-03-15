<?php

namespace App\Http\Requests;

use App\Enums\CategoryType;
use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'image' => [
                'nullable',
                'image'
            ],
            'status' => [
                'nullable',
            ],
            'category_type' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, array_column(CategoryType::cases(), 'value'))) {
                        $fail('نوع الفئة غير صالح');
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'slug.required' => 'حقل الرابط المختصر مطلوب',
            'category_type.required' => 'حقل نوع الفئة مطلوب',
        ];
    }
}