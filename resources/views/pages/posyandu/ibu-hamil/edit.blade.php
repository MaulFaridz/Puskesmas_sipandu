@extends('layouts.main')

@section('content')
<style>
    #kabupaten, #kecamatan {
        pointer-events:none;
    }
</style>
<h1 class="h3 mb-2 text-gray-800">Data Ibu Hamil</h1>
<p class="mb-4">Manajemen Ibu Hamil</p>
<div class="card shadow">
    <div class="card-header">
        <h4>Edit</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('ibu-hamil.update', $edit->ibu_hamil_id) }}" method="POST">
            @method('put')
            @csrf
            {{-- <div class="col"> --}}
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" class="form-control" id="kabupaten" aria-describedby="kabupaten"
                                name="kabupaten" value="{{ $edit->kabupaten }}">
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" aria-describedby="kecamatan"
                                name="kecamatan" value="{{ $edit->kecamatan }}">
                        </div>
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text" class="form-control" id="desa" aria-describedby="desa"
                                name="desa" value="{{ $edit->desa }}">
                        </div>
                        <div class="form-group">
                            <label for="posyandu">Posyandu</label>
                            <input type="text" class="form-control" id="posyandu" aria-describedby="posyandu"
                                name="posyandu" value="{{ $edit->posyandu }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" aria-describedby="nama_ayah"
                                name="nama_ayah" value="{{ $edit->nama_ayah }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" aria-describedby="nama_ibu"
                                name="nama_ibu" value="{{ $edit->nama_ibu }}">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="nama_bayi">Nama Bayi</label>
                            <input type="text" class="form-control" id="nama_bayi" aria-describedby="nama_bayi"
                                name="nama_bayi" value="{{ $edit->nama_bayi }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="laki-laki" {{ $edit->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="perempuan" {{ $edit->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir"
                                name="tgl_lahir" value="{{ $edit->tgl_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_meninggal">Tanggal Meninggal Ayah</label>
                            <input type="date" class="form-control" id="tgl_meninggal_ayah" aria-describedby="tgl_meninggal_ayah"
                                name="tgl_meninggal_ayah" value="{{ $edit->tgl_meninggal_ayah }}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_meninggal">Tanggal Meninggal Ibu</label>
                            <input type="date" class="form-control" id="tgl_meninggal_ibu" aria-describedby="tgl_meninggal_ibu"
                                name="tgl_meninggal_ibu" value="{{ $edit->tgl_meninggal_ibu }}">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" class="form-control" id="ket" aria-describedby="ket"
                                name="ket" value="{{ $edit->ket }}">
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
            {{-- <div class="col-4"> --}}
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a type="button" href="{{ route('ibu-hamil.index') }}" class="btn btn-danger">Cancel</a>
            {{-- </div> --}}
        </form>
    </div>
</div>
@endsection
