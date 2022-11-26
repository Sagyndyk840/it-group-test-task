<?php

namespace App\Http\Requests\Backend\Movie;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules ()
    {
        return [
            'movie_name' => 'required',
        ];
    }

    public function messages ()
    {
        return [
            'movie_name.required' => 'Movie name is required',
        ];
    }
}
