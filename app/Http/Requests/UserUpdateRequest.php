<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'id' => 'required',
            'name' => 'required|min:3|max:255',
            'surname' => 'nullable|min:3',
            'gender' => 'required',
            'city_id' => 'nullable',
            'date_of_birth' => 'nullable',
            'old_avatar' => 'nullable',
            'avatar' => 'nullable',
            'old_cover' => 'nullable',
            'cover' => 'nullable',
            'phone' => 'nullable',
            'phone' => 'nullable',
            'service_theme' => 'required',
            //'email' => 'required|min:3|email',
        ];
    }
}
