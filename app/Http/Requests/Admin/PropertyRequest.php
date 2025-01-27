<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
        switch($this->method()) {
            case 'POST': {
                return [
                    'name' => 'required',
                    'location' => 'required',
                    'price' => 'required',
                    'bed' => 'required',
                    'description' => 'required',
                    'category_id' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required', 'unique:properties,name,'. $this->route()->property->id],
                    'location' => 'required',
                    'price' => 'required',
                    'bed' => 'required',
                    'description' => 'required',
                    'category_id' => 'required'
                ];
            }
        }
    }
}
