<?php

namespace app\Http\Requests\Dashboard\Video;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,gif,bmp,webp', 'max:3096'],
            'alt_image' => ['nullable', 'string', 'max:255'],
            'video' => ['required', 'string'],
        ];
    }
}
