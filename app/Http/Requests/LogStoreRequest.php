<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogStoreRequest extends FormRequest
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
            'title' => 'required|max:255',
            'owner' => 'required',
            'device_id' => 'required|integer',
            'resolved' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Log title is required!',
            'owner.required' => 'Name of owner is required!',
            'device_id.required' => 'Device is required!',
            'device_id.integer' => 'Device value must be integer!',
            'resolved.required' => 'Resolved status is required!'
        ];
    }
}
