<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class publicationRequest extends FormRequest
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
            'title'=>'required|min:5',
            'body'=>'required|min:15',
            'image'=>'image|mimes:jpeg,jpg,png|max:10024'
        ];
    }

    
}
