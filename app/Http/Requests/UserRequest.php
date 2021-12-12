<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'birthday' => ['required', 'date', 'before:'.now()->subYears(18)->toDateString()],
            'gender' => 'required|in:male,female',
            'name' => 'required',
            'surname' => 'required'
            //
        ];
    }
}
