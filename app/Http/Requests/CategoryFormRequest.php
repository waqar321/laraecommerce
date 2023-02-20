<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
    public function rules(){

       return [
             'image' => ['nullable', 'mimes:jpg.jpeg,png'],
            'name' => ['required', 'min:5', 'max:255'],
            'slug' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:255'],
            // // 'status' => ['required', 'min:5', 'max:255'],
            'meta_title' => ['required', 'min:5', 'max:255'],
            'meta_keyword' => ['required', 'min:5', 'max:255'],
            'meta_description' => ['required', 'min:5', 'max:255'],

      ];
    }
}

