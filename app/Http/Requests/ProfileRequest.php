<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'nullable|string|min:2|max:128',
            'last_name' => 'nullable|string|min:2|max:128',
            'second_name' => 'nullable|string|min:2|max:128',
            'phone_number' => 'nullable|regex:/^\+\d{5,16}$/',
            'reserve_phone_number' => 'nullable|regex:/^\+\d{5,16}$/',
            'reserve_mail' => 'nullable|string|email|max:255',
            'skype' => 'nullable|string|min:2|max:128',
        ];
    }
}
