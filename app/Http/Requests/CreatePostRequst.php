<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequst extends FormRequest

{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:posts',
            'body' => 'required|string|max:1000',
            'is_published' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title should not be empty'
        ];
    }
}
