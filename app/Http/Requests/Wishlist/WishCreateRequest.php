<?php

namespace App\Http\Requests\WishList;

use Illuminate\Foundation\Http\FormRequest;

class WishCreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'price' => 'nullable|numeric',
            'link_buy' => 'nullable|url',
            'image' => 'nullable',
            'description' => 'nullable|min:3|max:255',
            'done' => '',
            'lists' => 'nullable',
        ];
    }
}
