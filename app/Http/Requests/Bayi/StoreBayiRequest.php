<?php

namespace App\Http\Requests\Posyandu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePosyanduRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_ortu' =>  'required',
            'nama_bayi' =>  'required',
            'jenis_kelamin' =>  'required',
            'tanggal_lahir' =>  'required',
            'tanggal_meninggal' =>  'required',
            'keterangan' =>  'required',

        ];
    }
}
