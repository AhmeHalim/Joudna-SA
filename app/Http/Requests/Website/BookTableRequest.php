<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class BookTableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date'  => 'required|date|after_or_equal:today',
            'time'  => 'required|string',
        ];
    }
}
