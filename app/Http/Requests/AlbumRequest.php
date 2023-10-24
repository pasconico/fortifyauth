<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'album_photo' => 'required',
            'album_name' => 'required',
            'album_genre' => 'required',
            'album_description' => 'required|string',
        ];
    }

    public function messages()
    {
        return[
            'album_photo' => 'Enter Album Photo',
            'album_name' => 'Enter Album Name',
            'album_genre' => 'Enter Album Genre',
            'album_description' => 'Enter Album Description',
        ];
    }
}
