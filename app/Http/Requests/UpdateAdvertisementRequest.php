<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertisementRequest extends FormRequest
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
            'id' => 'required|numeric',
            'title' => 'required|string|max:100|min:5',
            'description' => 'required|string|max:200|min:20',
            'image_url' => 'required|string|max:200',
            'price' => 'required|string|max:5|min:2',
            'category' => 'required|string|max:40|min:5',
            'city' => 'required|string|max:20|min:5',
            'user_id' => 'required|numeric',
        ];
    }
}
