<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookUpdate extends FormRequest
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
            'title' => ['required', 'min:3', 'max:255'],
            'author_id' => ['required',],
            'publishing_company_id' => ['required'],
            'category_id' => ['required'],
            'price' => ['required', 'numeric'],
            'tag' => ['required', 'min:3', 'max:255'],
            'publish_date' => ['required', 'date'],
            'quantity' => ['required', 'numeric'],
            'thumbnail' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'synopsis' => ['required', 'min:3'],
        ];
    }
}
