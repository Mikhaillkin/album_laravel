<?php

namespace App\Http\Requests\Photo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePhoto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'images' => 'required|array',
            'images.*' => 'required|mimes:jpg,jpeg,bmp,png,gif',
            'album_id' => 'required|integer' // нет проверки на существование альбома
        ];
    }

    public function messages() {
        return [
            'images.required' => 'Выберите одно или несколько фото'
        ];
    }
}
