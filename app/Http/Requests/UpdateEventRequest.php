<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_virtual' => 'required|boolean',
            'venue_id' => 'required|integer|exists:venues,id',
            'room' => 'required|string',
            'organizer_id' => 'required|integer|exists:users,id',
            'status' => 'required|string',
        ];
    }
}
