<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WisataRequest extends FormRequest
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
            'id_users' => 'exists:users,id',
            'id_kat_info' => 'exists:kategori_infos,id',
            'links' => 'required',
            'rating' => 'required|max:255',
            'jml_rating' => 'required|max:255',
            'keterangan' => 'required'
        ];
    }
}
