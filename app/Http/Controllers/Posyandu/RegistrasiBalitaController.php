<?php

namespace App\Http\Controllers\Posyandu;

use Illuminate\Http\Request;
use App\Models\RegistrasiBalita;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Posyandu\StoreRegistrasiBalitaRequest;

class RegistrasiBalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'ADMIN'){
            $regBalita = RegistrasiBalita::all();
        } else {
            $regBalita = RegistrasiBalita::where('user_id', Auth::user()->id)->get();
        }
        $data = [
            'title' => 'Sipandu | Posyandu',
            'regBalita' => $regBalita
        ];
        return view('pages.posyandu.registrasi-balita.index', $data);
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
    public function store(StoreRegistrasiBalitaRequest $request)
    {
        RegistrasiBalita::create($request->all());
        return redirect()->to(route('registrasi-balita.index'))->with('regBalitaCreate', 'Berhasil menambahkan registrasi balita ' . $request->nama_anak);
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
        $regBalita = RegistrasiBalita::findOrFail($id);
        $data = [
            'title' => 'Clinic | Edit Registrasi Balita',
            'edit' => $regBalita,
        ];
        return view('pages.posyandu.registrasi-balita.edit', $data);
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
        $regBalita      = RegistrasiBalita::findOrFail($id);
        $regBalita->update($data);

        return redirect()->to(route('registrasi-balita.index'))->with('regBalitaUpdate', 'Data registrasi balita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $regBalita = RegistrasiBalita::findOrFail($id);
        $regBalita->delete();
        return redirect()->to(route('registrasi-balita.index'))->with('regBalitaDelete', 'Data registrasi balita berhasil dihapus ' . $request->nama_anak);
    }
}
