<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallengeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5126',
            'location' => 'required|string|max:255',
            'days' => 'required|integer|min:0|max:364',
            'hours' => 'required|integer|min:0|max:23',
            'minutes' => 'required|integer|min:1|max:59',
            //'completion_score' => 'required|integer|min:0',
        ];
    }
}
