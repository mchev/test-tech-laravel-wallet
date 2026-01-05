<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecurringTransferRequest extends FormRequest
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
            'recipient_email' => 'required|exists:users,email',
            'start_date' => 'required|date|after:today',
            'end_date' => 'nullable|date|after:start_date',
            'frequency' => 'required|integer|min:1',
            'amount' => 'required|integer|min:0',
            'reason' => 'required|string',
        ];
    }
}
