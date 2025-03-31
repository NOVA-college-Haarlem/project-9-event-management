<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ticket_TypeRequest extends FormRequest
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
            'name' => 'required|string',
            'event_id' => 'required|exists:events,id',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer',
            'sales_start' => 'required|date',
            'sales_end' => 'required|date|after_or_equal:sales_start',
            'description' => 'nullable|string',
        ];
    }
}
