<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchesStoreRequest extends FormRequest
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
           'email' => 'required|email',
           'name' => 'required|string',
           'address' => 'required|string',
           'city' => 'required|string',
           'state' => 'required|string',
           'phone' => 'required|string',
        ];
    }
}
