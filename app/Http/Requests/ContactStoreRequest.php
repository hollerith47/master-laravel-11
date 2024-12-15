<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:20', 'min:5'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Hey please fill the name field',
            'name.max' => 'The max length of name have to be 20',
            'name.min' => 'The min length of name have to be 5',
            'email.required' => 'Hey email is required',
            'subject.required' => 'Hey the subject is required',
        ];
    }
}
