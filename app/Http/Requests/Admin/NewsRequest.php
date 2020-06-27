<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'judul' => 'required|max:255',
            'penggalan' => 'required|max:255',
            'penulis' => 'required|max:255',
            'tanggal' => 'required',
            'konten' => 'required',
            //'gambar' => 'required|image'
        ];
    }
}
