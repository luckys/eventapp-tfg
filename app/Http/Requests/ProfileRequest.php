<?php

namespace EventApp\Http\Requests;

class ProfileRequest extends Request
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
            'email' => 'required|email',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
        ];
    }
}
