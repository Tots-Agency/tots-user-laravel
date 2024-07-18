<?php

namespace Tots\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TotsUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['string', 'max:255', 'nullable'],
            'lastname' => ['string', 'max:255', 'nullable'],
            'email' => ['required', 'email'],
            'photo' => ['string', 'nullable'],
            'phone' => ['string', 'max:50', 'nullable'],
            'status' => ['nullable', 'integer'],
        ];
    }
}
