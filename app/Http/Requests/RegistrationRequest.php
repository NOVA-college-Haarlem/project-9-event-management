<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            // Regels voor store
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'address' => 'nullable|string',
                'event_id' => 'required|exists:events,id',
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Regels voor update
            return [
                'status' => 'required|in:pending,approved,rejected',
            ];
        }

        return [];
    }
}
