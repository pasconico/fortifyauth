<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
            'song_name' => 'required',
            'song_url' => 'required',
            'song_description' => 'required',
            'song_duration' => 'required|string',
        ];
    }

    public function messages()
    {
        return[
            'song_name' => 'Enter Song Name',
            'song_url' => 'URL is required',
            'song_description' => 'Enter song Description',
            'song_duration' => 'Enter Song Duration',
        ];
    }
}
