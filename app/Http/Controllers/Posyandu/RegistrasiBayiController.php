<?php

namespace App\Http\Controllers\Posyandu;

use Illuminate\Http\Request;
use App\Models\RegistrasiBayi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Posyandu\StoreRegistrasiBayiRequest;

class RegistrasiBayiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'ADMIN'){
            $regBayi = RegistrasiBayi::all();
        } else {
            $regBayi = RegistrasiBayi::where('user_id', Auth::user()->id)->get();
        }
        $data = [
            'title' => 'Sipandu | Posyandu',
            'regBayi' => $regBayi
        ];
        return view('pages.posyandu.registrasi-bayi.index', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrasiBayiRequest $request)
    {
        RegistrasiBayi::create($request->all());
        return redirect()->to(route('registrasi-bayi.index'))->with('regBayiCreate', 'Berhasil menambahkan registrasi bayi ' . $request->nama_bayi);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regBayi = RegistrasiBayi::findOrFail($id);
        $data = [
            'title' => 'Clinic | Edit Registrasi Bayi',
            'edit' => $regBayi,
        ];
        return view('pages.posyandu.registrasi-bayi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data         = $request->all();
        $regBayi      = RegistrasiBayi::findOrFail($id);
        $regBayi->update($data);

        return redirect()->to(route('registrasi-bayi.index'))->with('regBayiUpdate', 'Data registrasi bayi berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $regBayi = RegistrasiBayi::findOrFail($id);
        $regBayi->delete();
        return redirect()->to(route('registrasi-bayi.index'))->with('regBayiDelete', 'Data registrasi bayi berhasil dihapus ' . $request->nama_bayi);
    }
}
