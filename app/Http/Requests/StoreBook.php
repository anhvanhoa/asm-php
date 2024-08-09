<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
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
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'synopsis' => ['required', 'min:3'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    // public function messages(): array
    // {
    //     return [
    //         'title.required' => 'Title is required',
    //         'title.min' => 'Title must be at least 3 characters',
    //         'title.max' => 'Title must be at most 255 characters',
    //         'author_id.required' => 'Author is required',
    //         'publishing_company_id.required' => 'Publishing company is required',
    //         'category_id.required' => 'Category is required',
    //         'price.required' => 'Price is required',
    //         'price.numeric' => 'Price must be a number',
    //         'tag.required' => 'Tag is required',
    //         'tag.min' => 'Tag must be at least 3 characters',
    //         'tag.max' => 'Tag must be at most 255 characters',
    //         'publish_date.required' => 'Publish date is required',
    //         'publish_date.date' => 'Publish date must be a date',
    //         'quantity.required' => 'Quantity is required',
    //         'quantity.numeric' => 'Quantity must be a number',
    //         'thumbnail.required' => 'Thumbnail is required',
    //         'thumbnail.image' => 'Thumbnail must be an image',
    //         'synopsis.required' => 'Synopsis is required',
    //         'synopsis.min' => 'Synopsis must be at least 3 characters',
    //     ];
    // }
}
