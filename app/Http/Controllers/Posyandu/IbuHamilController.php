<?php

namespace App\Http\Controllers\Posyandu;

use App\Models\IbuHamil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Posyandu\StoreIbuHamilRequest;

class IbuHamilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ibuHamil = IbuHamil::where('user_id', Auth::user()->id)->get();
        // dd(Auth::user()->level == 'ADMIN');
        if (Auth::user()->level == 'ADMIN') {
            $ibuHamil = IbuHamil::all();
        } else {
            $ibuHamil = IbuHamil::where('user_id', Auth::user()->id)->get();
        }
        $data = [
            'title' => 'Sipandu | Posyandu',
            'ibuHamil' => $ibuHamil,
        ];
        return view('pages.posyandu.ibu-hamil.index' , $data);
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
    public function store(StoreIbuHamilRequest $request)
    {
        // dd($request->all());
        IbuHamil::create($request->all());
        return redirect()->to(route('ibu-hamil.index'))->with('ibuHamilCreate', 'Berhasil menambahkan ibu hamil ' . $request->nama_ortu);
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
        $ibuHamil = IbuHamil::findOrFail($id);
        $data   = [
            'title' => 'Clinic | Edit Ibu Hamil',
            'edit'  => $ibuHamil,
        ];
        return view('pages.posyandu.ibu-hamil.edit', $data);
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
        $ibuHamil     = IbuHamil::findOrFail($id);
        $ibuHamil->update($data);

        return redirect()->to(route('ibu-hamil.index'))->with('ibuUpdate', 'Data Ibu Hamil berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ibuHamil = IbuHamil::findOrFail($id);
        $ibuHamil->delete();
        return redirect()->to(route('ibu-hamil.index'))->with('ibuDelete', 'Data Ibu Hamil berhasil dihapus ' . $request->nama_ortu);
    }
}
