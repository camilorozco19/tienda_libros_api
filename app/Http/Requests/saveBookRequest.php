<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'book_name' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'book_description' => 'required|string|max:3000',
            'book_image' => 'required|string|max:255',

        ];
    }
}
