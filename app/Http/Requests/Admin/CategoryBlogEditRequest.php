<?php

namespace App\Http\Requests\Admin;

use App\Models\CategoryBlog;
use Illuminate\Foundation\Http\FormRequest;

class CategoryBlogEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            // 'slug' => 'required|unique:category_blogs,slug,' . $categories->id,
            'parent_id' => 'required',
            'is_active' => 'required',
        ];
    }
}
