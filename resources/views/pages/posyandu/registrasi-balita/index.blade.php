@extends('layouts.main')

@section('content')
<style>
    #kabupaten, #kecamatan {
        pointer-events:none;
    }
</style>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Registrasi Balita</h1>
    <p class="mb-4">Manajemen Balita</p>
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
                            <th>Nama Anak</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>KLP Dasa Wisma</th>
                            <th>Hasil Penimbangan</th>
                            <th>Pelayanan Yang Diberikan</th>
                            <th>Keterangan</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($regBalita as $row)
                            <tr>
                                <td width="5%">{{ $no++ }}</td>
                                <td>{{ $row->kabupaten }}</td>
                                <td>{{ $row->kecamatan }}</td>
                                <td>{{ $row->desa }}</td>
                                <td>{{ $row->posyandu }}</td>
                                <td>{{ $row->nama_anak }}</td>
                                <td>{{ $row->tgl_lahir }}</td>
                                <td>{{ $row->nama_ayah }}</td>
                                <td>{{ $row->nama_ibu }}</td>
                                <td>{{ $row->klp }}</td>
                                <td>{{ $row->hasil_penimbangan }}</td>
                                <td>
                                    @if ($row->s_besi)
                                        <div><b>Sirup Besi</b><br>({{ $row->s_besi }} BLN)</br></div>
                                    @endif
                                    @if ($row->sirup_besi)
                                    - {{ $row->sirup_besi }}
                                    @endif

                                    @if($row->v_a)
                                    <div><b>Vit A </b>({{ $row->v_a}})</div>
                                    @endif

                                    @if ($row->vit_a)
                                    - {{ $row->vit_a }}
                                    @endif

                                    @if ($row->oralit)
                                    <div><b>Oralit</b></div>
                                          - {{ $row->oralit}}
                                    </li>
                                    @endif
                                    @if ($row->pmt)
                                    <div><b>PMT</b><br>- {{ $row->pmt }}
                                    @endif
                                </td>
                                <td>{{ $row->ket }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>

                                    <form action="{{route('registrasi-balita.destroy', $row->reg_balita_id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('registrasi-balita.edit', $row->reg_balita_id) }}" class="btn btn-sm btn-warning mb-2">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Anda Yakin Menghapus Data Balita ?')">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Balita</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('registrasi-balita.store') }}" method="POST">
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
                                class="form-control" placeholder="Masukan Desa" required>
                        </div>
                        <div class="form-group">
                            <label for="posyandu">Nama Posyandu<code>*</code></label>
                            <input type="text" name="posyandu" id="posyandu" aria-describedby="posyandu"
                                class="form-control" placeholder="Masukan Posyandu" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_anak">Nama Anak<code>*</code></label>
                            <input type="text" name="nama_anak" id="nama_anak" aria-describedby="nama_anak"
                                class="form-control" placeholder="Masukan Nama Anak" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin<code>*</code></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir<code>*</code></label>
                            <input type="date" class="form-control" placeholder="Masukan Tanggal Lahir" id="tgl_lahir" aria-describedby="tgl_lahir"
                                name="tgl_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ayah<code>*</code></label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Ortu" id="nama_ayah" aria-describedby="nama_ayah"
                                name="nama_ayah" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ibu<code>*</code></label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Ortu" id="nama_ibu" aria-describedby="nama_ibu"
                                name="nama_ibu" required>
                        </div>
                        <div class="form-group">
                            <label for="klp">KLP Dasa Wisma</label>
                            <input type="text" class="form-control" placeholder="Masukan KLP" id="klp" aria-describedby="klp"
                                name="klp">
                        </div>
                        <div class="form-group">
                            <label for="hasil_penimbangan">Hasil Penimbangan</label>
                            <select name="hasil_penimbangan" id="hasil_penimbangan" class="form-control">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                            <br>
                            <label for="hasil_penimbangan">Hasil Penimbangan</label>
                            <input type="text" name="hsl_penimbangan" id="hsl_penimbangan" class="form-control" placeholder="Masukan Hasil Penimbangan">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Pelayanan yang Diberikan</label>
                            <div class="form-group">
                                <label for="">Sirup Besi </label>
                                <select name="s_besi" id="s_besi" class="form-control" >
                                    <option value="">-- Pilih Sirup Besi --</option>
                                    <option value="fe1">Fe 1 BLN</option>
                                    <option value="fe2">Fe 2 BLN</option>
                                </select>
                                <input type="text" class="form-control mt-2" placeholder="Masukan Sirup Besi" id="sirup_besi" aria-describedby="sirup_besi"
                                name="sirup_besi" >
                            </div>
                            <div class="form-group">
                                <label for="">Vitamin A </label>
                                <select name="v_a" id="v_a" class="form-control" >
                                    <option value="">-- Pilih Vitamin A --</option>
                                    <option value="1_bln">1 BLN</option>
                                    <option value="2_bln">2 BLN</option>
                                </select>
                                <input type="text" class="form-control mt-2" placeholder="Masukan Vit A" id="vit_a" aria-describedby="vit_a"
                                name="vit_a" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pmt">PMT Pemulihan Bulan</label>
                            <input type="text" class="form-control" placeholder="Masukan PMT" id="pmt" aria-describedby="pmt" name="pmt"
                                >
                        </div>
                        <div class="form-group">
                            <label for="oralit">Oralit Bln </label>
                            <input type="text" class="form-control" placeholder="Masukan Oralit" id="oralit_bln" aria-describedby="oralit" name="oralit"
                                >
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" class="form-control" placeholder="Masukan Keterangan" id="ket" aria-describedby="ket" name="ket">
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
        @if (session('regBalitaCreate'))
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
                        title: '{{ session('regBalitaCreate') }}'
                    })
            </script>
            @endif
            @if (session('regBalitaUpdate'))
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
                        title: '{{ session('regBalitaUpdate') }}'
                    })
                </script>
            @endif
            @if (session('regBalitaDelete'))
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
                        title: '{{ session('regBalitaDelete') }}'
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
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 , 12, 13, 14]
                            },
                            autoFilter: true,
                            sheetName: 'Exported data'
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12, 13,14]
                            }
                        },
                        ],
                    } );
                } );
            </script>
        @endpush
    @endsection
