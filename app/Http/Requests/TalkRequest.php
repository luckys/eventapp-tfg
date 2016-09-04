<?php

namespace EventApp\Http\Requests;

class TalkRequest extends Request
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
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required',
            'address' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image',
        ];
    }
}
