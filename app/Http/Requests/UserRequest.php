<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'birthday' => ['required', 'date', 'before:'.now()->subYears(18)->toDateString()],
            'gender' => ['required', 'in:' . implode(',', User::GENDERS)],
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'hashtag' => ['nullable', 'string'],
            'avatar' => ['nullable', 'string']
        ];
    }
}
