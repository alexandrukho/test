<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'language_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string'
        ];
    }

    //Дальше можно кастомизировать сообщения и т.п
}
