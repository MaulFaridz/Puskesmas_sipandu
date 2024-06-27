
@extends('layouts.main')

@section('content')
<style>
    #kabupaten, #kecamatan {
        pointer-events:none;
    }
</style>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Ibu Hamil</h1>
    <p class="mb-4">Manajemen Ibu Hamil</p>
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
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Posyandu</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Nama Bayi</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Meninggal Ayah</th>
                            <th>Tanggal Meninggal Ibu</th>
                            <th>Keterangan</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($ibuHamil as $row)
                            <tr>
                                <td width="5%">{{ $no++ }}</td>
                                <td>{{ $row->kabupaten }}</td>
                                <td>{{ $row->kecamatan }}</td>
                                <td>{{ $row->desa }}</td>
                                <td>{{ $row->posyandu }}</td>
                                <td>{{ $row->nama_ayah }}</td>
                                <td>{{ $row->nama_ibu }}</td>
                                <td>{{ $row->nama_bayi }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->tgl_lahir }}</td>
                                <td>{{ $row->tgl_meninggal_ayah }}</td>
                                <td>{{ $row->tgl_meninggal_ibu }}</td>
                                <td>{{ $row->ket }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <form action="{{ route('ibu-hamil.destroy', $row->ibu_hamil_id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('ibu-hamil.edit', $row->ibu_hamil_id) }}"
                                                class="btn btn-sm btn-warning mb-1">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Anda Yakin Menghapus Data Ibu Hamil?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria- labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ibu Hamil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ibu-hamil.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text"  name="kabupaten" value="Purwakarta" id="kabupaten" aria-describedby="kabupaten"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" value="Cibatu" aria-describedby="kecamatan"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="desa">Desa<code>*</code></label>
                            <input type="text" name="desa" id="desa" aria-describedby="desa"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="posyandu">Nama Posyandu<code>*</code></label>
                            <input type="text" name="posyandu" id="posyandu" aria-describedby="posyandu"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ayah<code>*</code></label>
                            <input type="text" name="nama_ayah" id="nama_ayah" aria-describedby="nama_ayah"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ibu<code>*</code></label>
                            <input type="text" name="nama_ibu" id="nama_ibu" aria-describedby="nama_ibu"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_bayi">Nama Bayi<code>*</code></label>
                            <input type="text" class="form-control" id="nama_bayi" aria-describedby="nama_bayi"
                                name="nama_bayi" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin Bayi<code>*</code></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir<code>*</code></label>
                            <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir"
                                name="tgl_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_meninggal">Tanggal Meninggal Ayah</label>
                            <input type="date" class="form-control" id="tgl_meninggal_ayah" aria-describedby="tgl_meninggal_ayah"
                                name="tgl_meninggal_ayah">
                        </div>
                        <div class="form-group">
                            <label for="tgl_meninggal">Tanggal Meninggal Ibu</label>
                            <input type="date" class="form-control" id="tgl_meninggal_ibu" aria-describedby="tgl_meninggal_ibu"
                                name="tgl_meninggal_ibu">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" class="form-control" id="ket" aria-describedby="ket" name="ket"
                                >
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
        @if (session('ibuHamilCreate'))
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
                        title: '{{ session('ibuHamilCreate') }}'
                    })
            </script>
            @endif
            @if (session('ibuUpdate'))
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
                        title: '{{ session('ibuUpdate ') }}'
                    })
                </script>
            @endif
            @if (session('ibuDelete'))
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
                        title: '{{ session(' ibuDelete ') }}'
                    })
                </script>
            @endif
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable( {
                        dom: 'Bfrtip',
                        responsive: true,
                        buttons: [
                        //    'csv', 'excel', 'pdf',
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12,13]
                            },
                            autoFilter: true,
                            sheetName: 'Exported data'
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12,13]
                            }
                        },
                        ],
                    } );
                } );
            </script>
        @endpush
    @endsection
