<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|required|unique:tasks,title,' . $this->task->id,
            'description' => 'nullable|string',
            'status' => 'in:pending,completed',
            'due_date' => 'sometimes|date|after:today',
        ];
    }
}
