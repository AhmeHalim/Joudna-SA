<?php

namespace app\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_en'   => ['required', 'string', 'max:255'],
            'name_ar'   => ['required', 'string', 'max:255'],
            'image'     => ['nullable', 'image', 'mimes:jpeg,png,gif,bmp,webp', 'max:3096'],
            'alt_image' => ['nullable', 'string', 'max:255'],
            'slug_en'   => ['nullable', 'string'],
            'slug_ar'   => ['nullable', 'string'],
            'status'    => ['nullable', 'in:published,inactive'],
            'home'      => ['nullable', 'boolean'],
        ];
    }
}
