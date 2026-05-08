<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fname'       => 'required|string|max:255',
            'lname'       => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:20',
            'first_visit' => 'required|in:yes,no',
            'rating'      => 'required|integer|min:1|max:5',
            'nationality' => 'required|string|max:255',
            'message'     => 'required|string|min:10',
        ];
    }
}
