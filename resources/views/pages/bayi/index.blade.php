@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Bayi</h1>
<p class="mb-4">Manajemen Posyandu</p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah
                Data</button>
            </button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bayi</th>
                        <th>Jenis kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>BBL</th>
                        <th>Nama Ortu</th>
                        <th>Klp Desa</th>
                        <th>Hasil Penimbangan</th>
                        <th>Pelayanan</th>
                        <th>oralit bln</th>
                        <th>Imunisasi</th>
                        <th>BCG</th>
                        <th>Campak</th>
                        <th>Hepatitis</th>
                        <th>Tanggal Meninggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                </thead>
                {{-- @if (Auth::user($request->session()->get('id'))) --}}
                <tbody>
                    @php
                    $no = 1;
                    @endphp

                    @foreach ($bayi as $row)
                    <tr>
                        <td width="5%">{{ $no++ }}</td>
                        <td>{{ $row->nama_bayi }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->tanggal_lahir }}</td>
                        <td>{{ $row->bbl }}</td>
                        <td>{{ $row->nama_ortu }}</td>
                        <td>{{ $row->klp_desa }}</td>
                        <td>{{ $row->hasil_penimbangan }}</td>
                        <td>{{ $row->pelayanan }}</td>
                        <td>{{ $row->oralit_bln }}</td>
                        <td>{{ $row->imunisasi }}</td>
                        <td>{{ $row->bcg }}</td>
                        <td>{{ $row->campak }}</td>
                        <td>{{ $row->hepatitis }}</td>
                        <td>{{ $row->tanggal_meninggal }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td>
                            <form action="{{ route('bayi.destroy', $row->bayi_id) }}" method="POST">
                                @method('delete')
                                @csrf
                                {{-- <a href="{{ route('bayi.edit', $row->id) }}"
                                class="btn btn-sm btn-warning">Edit</a> --}}
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{-- @endif --}}
            </table>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria- labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah
                    Data Posyandu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bayi.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8 col-sm-6">
                                    <div class="form-group">
                                        <label for="posyandu">Posyandu</label>
                                        <input type="text" class="form-control" id="posyandu" aria-describedby="posyandu" name="posyandu" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bangunan">BANGUNAN</label>

                                        <select name="bangunan" id="bangunan" class="form-control" required>
                                            <option value="sendiri">Sendiri</option>
                                            <option value="numpang">Numpang</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fk_panembangan">FREKUENSI PENIMBANGAN</label>
                                        <input type="text" class="form-control" id="fk_panembangan" aria-describedby="fk_panembangan" name="fk_panembangan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_kader">JUMLAH KADER</label>
                                        <input type="text" class="form-control" id="jumlah_kader" aria-describedby="jumlah_kader" name="jumlah_kader" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rerata_cakupan">RERATA CAKUPAN D/S</label>
                                        <input type="text" class="form-control" id="rerata_cakupan" aria-describedby="rerata_cakupan" name="rerata_cakupan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sk_posyandu">SK Posyandu</label>
                                        <input type="text" class="form-control" id="sk_posyandu" aria-describedby="sk_posyandu" name="sk_posyandu" required>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" aria-describedby="alamat" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cakupan_komulatif_kia">CAKUPAN KOMULATIF KIA</label>
                                        <input type="text" class="form-control" id="cakupan_komulatif_kia" aria-describedby="cakupan_komulatif_kia" name="cakupan_komulatif_kia" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cakupan_komulatif_kb">CAKUPAN KOMULATIF KB</label>
                                        <input type="text" class="form-control" id="cakupan_komulatif_kb" aria-describedby="cakupan_komulatif_kb" name="cakupan_komulatif_kb" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ck_imunisasi">CAKUPAN KOMULATIF IMUNISASI </label>
                                        <input type="text" class="form-control" id="ck_imunisasi" aria-describedby="ck_imunisasi" name="ck_imunisasi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keg_posyandu">KEGIATAN POSYANDU</label>
                                        <input type="text" class="form-control" id="keg_posyandu" aria-describedby="keg_posyandu" name="keg_posyandu" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="dana_sehat">DANA SEHAT</label>
                                        <input type="text" class="form-control" id="dana_sehat" aria-describedby="dana_sehat" name="dana_sehat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="strata_posyandu">Strata Posyandu</label>

                                        <select name="strata_posyandu" id="strata_posyandu" class="form-control" required>
                                            <option value="pratama">Pratama</option>
                                            <option value="madya">Madya</option>
                                            <option value="purnama">Purnama</option>
                                            <option value="mandiri">Mandiri</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    @push('addon-js')
    @if (session('bayiCreate'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '{{ session('
            bayiCreate ') }}'
        })
    </script>
    @endif
    @if (session('pasienUpdate'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '{{ session('
            pasienUpdate ') }}'
        })
    </script>
    @endif
    @if (session('bayiDelete'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '{{ session('
            bayiDelete ') }}'
        })
    </script>
    @endif
    @endpush
    @endsection