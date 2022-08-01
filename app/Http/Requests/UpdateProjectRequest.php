<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'required|min:5|unique:projects,name',
            'description' => 'required|min:15|max:220',
            'image' => 'required|mimes:png,jpg,jpeg',
            'live_link' => 'required|url',
            'source_code' => 'required|url'
        ];
    }
}
