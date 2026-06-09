<?php

namespace App\Http\Requests;

//use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        $id = $this->route('employee'); // Ambil ID dari route parameter
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,'. $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'position' => 'required|string|max:100',
            'department' => 'required|string|max:100',
        ];
    }
}
