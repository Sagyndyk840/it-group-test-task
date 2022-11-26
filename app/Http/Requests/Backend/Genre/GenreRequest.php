<?php

namespace App\Http\Requests\Backend\Genre;

use App\Models\Genre;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class GenreRequest extends FormRequest
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
    public function rules (Request $request)
    {
        $genre = Genre::where('genre_name', $request->genre_name)->first();

        if ($genre) {
            return [
                'genre_name' => 'required',
            ];
        } else {
            return [
                'genre_name' => 'required|unique:genres',
            ];
        }

    }

    public function messages ()
    {
        return [
            'genre_name.required' => 'Genre name is required',
            'genre_name.unique'   => 'Genre name is not unique',
        ];
    }
}
