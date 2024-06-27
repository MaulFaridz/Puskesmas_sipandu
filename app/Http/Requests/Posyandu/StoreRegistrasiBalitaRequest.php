<?php

namespace App\Http\Requests\Posyandu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRegistrasiBalitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'posyandu' => 'required',
            'nama_ayah' =>  'required',
            'nama_ibu' =>  'required',
            'nama_anak' =>  'required',
            'jenis_kelamin' =>  'required',
            'tgl_lahir' =>  'required',
            // 'tgl_meninggal' =>  'max:255',
            'ket' =>  'required',
        ];
    }
}
