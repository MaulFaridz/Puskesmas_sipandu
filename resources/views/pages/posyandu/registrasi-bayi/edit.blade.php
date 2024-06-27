@extends('layouts.main')

@section('content')
<style>
    #kabupaten, #kecamatan {
        pointer-events:none;
    }
</style>
<h1 class="h3 mb-2 text-gray-800">Data Registrasi Bayi</h1>
<p class="mb-4">Manajemen Registrasi Bayi</p>
<div class="card shadow">
    <div class="card-header">
        <h4>Edit</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('registrasi-bayi.update', $edit->reg_bayi_id) }}" method="POST">
            @method('put')
            @csrf
            <div class="col">
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
                            <label for="tgl_meninggal">BBL</label>
                            <input type="text" class="form-control" id="bbl" aria-describedby="bbl"
                                name="bbl" value="{{ $edit->bbl }}">
                        </div>

                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" class="form-control" id="ket" aria-describedby="ket"
                                name="ket" value="{{ $edit->ket }}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_meninggal">Bulan Penimbang</label>
                            <select name="hasil_penimbangan" id="hasil_penimbangan" class="form-control">
                                <option value="januari" {{ $edit->hasil_penimbangan == 'januari' ? 'selected' : '' }}>Januari
                                </option>
                                <option value="februari" {{ $edit->hasil_penimbangan == 'februari' ? 'selected' : '' }}>Februari
                                </option>
                                <option value="maret" {{ $edit->hasil_penimbangan == 'maret' ? 'selected' : '' }}>Maret
                                </option>
                                <option value="april" {{ $edit->hasil_penimbangan == 'april' ? 'selected' : '' }}>April
                                </option>
                                <option value="mei" {{ $edit->hasil_penimbangan == 'mei' ? 'selected' : '' }}>Mei
                                </option>
                                <option value="juni" {{ $edit->hasil_penimbangan == 'juni' ? 'selected' : '' }}>Juni
                                </option>
                                <option value="juli" {{ $edit->hasil_penimbangan == 'juli' ? 'selected' : '' }}>Juli
                                </option>
                                <option value="agustus" {{ $edit->hasil_penimbangan == 'agustus' ? 'selected' : '' }}>Agustus
                                </option>
                                <option value="september" {{ $edit->hasil_penimbangan == 'september' ? 'selected' : '' }}>September
                                </option>
                                <option value="oktober" {{ $edit->hasil_penimbangan == 'oktober' ? 'selected' : '' }}>Oktober
                                </option>
                                <option value="november" {{ $edit->hasil_penimbangan == 'november' ? 'selected' : '' }}>November
                                </option>
                                <option value="desember" {{ $edit->hasil_penimbangan == 'desember' ? 'selected' : '' }}>Desember
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hsl_penimbangan">Hasil Penimbangan</label>
                            <input type="date" class="form-control" id="hsl_penimbangan" aria-describedby="hsl_penimbangan"
                                name="hsl_penimbangan" value="{{ $edit->hsl_penimbangan }}">
                        </div>
                        <div class="form-group">
                            <label for="s_besi">Sirup Besi</label>
                            <select name="s_besi" id="s_besi" class="form-control">
                                <option value="fe1" {{ $edit->s_besi == 'fe1' ? 'selected' : '' }}>Fe 1 BLN
                                </option>
                                <option value="fe2" {{ $edit->s_besi == 'fe2' ? 'selected' : '' }}>Fe 2 BLN
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sirup_besi">Sirup Besi</label>
                            <input type="text" class="form-control" id="sirup_besi" aria-describedby="sirup_besi"
                                name="sirup_besi" value="{{ $edit->sirup_besi }}">
                        </div>
                        <div class="form-group">
                            <label for="v_a">Vitamin A</label>
                            <select name="v_a" id="v_a" class="form-control">
                                <option value="1_bln" {{ $edit->v_a == '1_bln' ? 'selected' : '' }}>1 BLN
                                </option>
                                <option value="2_bln" {{ $edit->v_a == '2_bln' ? 'selected' : '' }}>2 BLN
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vit_a">Vitamin A</label>
                            <input type="text" class="form-control" id="vit_a" aria-describedby="vit_a"
                                name="vit_a" value="{{ $edit->vit_a }}">
                        </div>
                        <div class="form-group">
                            <label for="oralit_bln">Oralit Bln</label>
                            <input type="text" class="form-control" value="{{ $edit->oralit_bln }}" placeholder="Masukan Oralit" id="oralit_bln" aria-describedby="oralit_bln" name="oralit_bln">
                        </div>
                        <div class="form-group">
                            <label for="dtp_2">DTP</label>
                            <select name="dtp_2" id="dtp_2" class="form-control">
                                <option value="I" {{ $edit->dtp_2 == 'I' ? 'selected' : '' }}>I
                                </option>
                                <option value="II" {{ $edit->dtp_2 == 'II' ? 'selected' : '' }}>II
                                </option>
                                <option value="III" {{ $edit->dtp_2 == 'III' ? 'selected' : '' }}>III
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="hsl_penimbangan">Hasil Penimbang</label>
                            <input type="text" class="form-control" id="hsl_penimbangan" aria-describedby="hsl_penimbangan"
                                name="hsl_penimbangan" value="{{ $edit->hsl_penimbangan }}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_meninggal">Tanggal Meninggal</label>
                            <input type="date" class="form-control" id="tgl_meninggal" aria-describedby="tgl_meninggal"
                                name="tgl_meninggal" value="{{ $edit->tgl_meninggal }}">
                        </div>
                        <div class="form-group">
                            <label for="polio">Polio</label>
                            <input type="text" class="form-control" value="{{ $edit->polio }}" placeholder="Masukan Oralit" id="polio" aria-describedby="polio" name="polio">
                        </div>
                        <div class="form-group">
                            <label for="campak">Campak</label>
                            <input type="text" class="form-control" value="{{ $edit->campak }}" placeholder="Masukan Oralit" id="campak" aria-describedby="campak" name="campak">
                        </div>
                        <div class="form-group">
                            <label for="hepatitis">Hepatitis</label>
                            <input type="text" class="form-control" value="{{ $edit->hepatitis }}" placeholder="Masukan Oralit" id="hepatitis" aria-describedby="hepatitis" name="hepatitis">
                        </div>
                        <div class="form-group">
                            <label for="dtp">DTP</label>
                            <input type="text" class="form-control" value="{{ $edit->dtp }}" placeholder="Masukan Oralit" id="dtp" aria-describedby="dtp" name="dtp">
                        </div>
                        <div class="form-group">
                            <label for="polio_2">POLIO</label>
                            <select name="polio_2" id="polio_2" class="form-control">
                                <option value="I" {{ $edit->polio_2 == 'I' ? 'selected' : '' }}>I
                                </option>
                                <option value="II" {{ $edit->polio_2 == 'II' ? 'selected' : '' }}>II
                                </option>
                                <option value="III" {{ $edit->polio_2 == 'III' ? 'selected' : '' }}>III
                                </option>
                                <option value="IV" {{ $edit->polio_2 == 'IV' ? 'selected' : '' }}>IV
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_meninggal">KLP Dasa Wisma</label>
                            <input type="text" class="form-control" id="klp" aria-describedby="klp"
                                name="klp" value="{{ $edit->klp }}">
                        </div>
                        <div class="form-group">
                            <label for="bcg">BCG</label>
                            <input type="text" class="form-control" value="{{ $edit->bcg }}" placeholder="Masukan BCG" id="bcg" aria-describedby="bcg" name="bcg">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-4"> --}}
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a type="button" href="{{ route('registrasi-bayi.index') }}" class="btn btn-danger">Cancel</a>
            {{-- </div> --}}

        </form>
    </div>
</div>
@endsection
