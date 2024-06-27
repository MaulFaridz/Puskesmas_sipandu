<?php

namespace App\Http\Requests\Desa;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreDesaRequest extends FormRequest
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
            'posyandu'   =>  'required',
            'alamat'   =>  'required',
            'bangunan' => 'required',
            'fk_panembangan'   =>  'required',
            'jumlah_kader'   =>  'required',
            'rerata_cakupan'   =>  'required',
            'cakupan_komulatif_kia'   =>  'required',
            'cakupan_komulatif_kb'   =>  'required',
            'ck_imunisasi'   =>  'required',
            'keg_posyandu'   =>  'required',
            'dana_sehat'   =>  'required',
            'sk_posyandu'   =>  'required',
            'strata_posyandu'   =>  'required',
        ];
    }
}
