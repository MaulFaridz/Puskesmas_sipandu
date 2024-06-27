@extends('layouts.main')

@section('content')
<style>
    #kabupaten, #kecamatan {
        pointer-events:none;
    }
</style>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Registrasi Bayi</h1>
    <p class="mb-4">Manajemen Resgistrasi Bayi</p>
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
                            <th>Nama Bayi</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>BBL</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>KLP Dasa Wisma</th>
                            <th>Bulan Penimbangan</th>
                            <th>Hasil Penimbangan</th>
                            <th>Pelayanan diberikan</th>
                            <th>Pemberian Imunisasi</th>
                            <th>Tanggal Meninggal (Optional)</th>
                            <th>Keterangan</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($regBayi as $row)
                            <tr>
                                <td width="5%">{{ $no++ }}</td>
                                <td>{{ $row->kabupaten }}</td>
                                <td>{{ $row->kecamatan }}</td>
                                <td>{{ $row->desa }}</td>
                                <td>{{ $row->posyandu }}</td>
                                <td>{{ $row->nama_bayi }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->tgl_lahir }}</td>
                                <td>{{ $row->bbl }}</td>
                                <td>{{ $row->nama_ayah }}</td>
                                <td>{{ $row->nama_ibu }}</td>
                                <td>{{ $row->klp }}</td>

                                    <td>{{ $row->hasil_penimbangan }}</td>
                                    <td>{{ $row->hsl_penimbangan }}</td>
                                    <td>
                                        @if ($row->s_besi)
                                            <div><b>Sirup Besi</b><br>({{ $row->s_besi }} BLN)</br></div>
                                        @endif
                                        @if ($row->sirup_besi)
                                        - {{ $row->sirup_besi }}
                                        @endif

                                        @if($row->v_a)
                                        <div><b>Vit A </b><br>({{ $row->v_a}})</br></div>
                                        @endif

                                        @if ($row->vit_a)
                                        - {{ $row->vit_a }}
                                        @endif

                                        @if ($row->oralit_bln)
                                        <div><b>Oralit</b></div>
                                              - {{ $row->oralit_bln}}
                                        </li>
                                        @endif
                                    </td>
                                <td>

                                    @if ($row->bcg)
                                    <div><b>BCG</b></div>
                                       - {{ $row->bcg }}
                                    @endif
                                    @if ($row->dtp_2)
                                        <div><b>DTP {{ $row->dtp_2}}</b></div>
                                    @endif

                                    @if ($row->dtp)
                                    - {{ $row->dtp}}
                                    @endif

                                    @if ($row->polio_2)
                                    <div><b>Polio {{ $row->polio_2}}</b></div>
                                    @endif

                                    @if ($row->polio)
                                    - {{ $row->polio}}
                                    @endif

                                    @if ($row->campak)
                                    <div><b>Campak</b></div>
                                       - {{ $row->campak }}
                                    @endif

                                    @if ($row->hepatitis)
                                    <div><b>Hepatitis</b></div>
                                       - {{ $row->hepatitis }}
                                    @endif
                                </td>
                                <td>{{ $row->tanggal_meninggal }}</td>
                                <td>{{ $row->ket }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>

                                    <form action="{{ route('registrasi-bayi.destroy', $row->reg_bayi_id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('registrasi-bayi.edit', $row->reg_bayi_id) }}" class="btn btn-sm btn-warning mb-2">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Anda Yakin Menghapus Data Bayi ?')">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bayi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('registrasi-bayi.store') }}" method="POST">
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
                            <label for="nama_bayi">Nama Bayi<code>*</code></label>
                            <input type="text" name="nama_bayi" id="nama_bayi" aria-describedby="nama_bayi"
                                class="form-control" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir<code>*</code></label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" aria-describedby="tgl_lahir"
                                class="form-control" placeholder="Masukan Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin Bayi<code>*</code></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="bbl">BBL gram</label>
                            <input type="text" class="form-control" placeholder="Masukan BBL" id="bbl" aria-describedby="bbl"
                                name="bbl">
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ayah<code>*</code></label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Ayah" id="nama_ayah" aria-describedby="nama_ayah"
                                name="nama_ayah">
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ibu<code>*</code></label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Ibu" id="nama_ibu" aria-describedby="nama_ibu"
                                name="nama_ibu">
                        </div>
                        <div class="form-group">
                            <label for="klp">Klp Dasa Wisma</label>
                            <input type="text" class="form-control" placeholder="Masukan KLP" id="klp" aria-describedby="klp" name="klp">
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
                            <label for="">(Pelayanan yang Diberikan)</label>
                            <div class="form-group">
                                <label for="">Sirup Besi </label>
                                <select name="s_besi" id="s_besi" class="form-control">
                                    <option value="">-- Pilih Sirup --</option>
                                    <option value="fe1">Fe 1 BLN</option>
                                    <option value="fe2">Fe 2 BLN</option>
                                </select>
                                <input type="text" class="form-control mt-2" placeholder="Masukan Sirup Besi" id="sirup_besi" aria-describedby="sirup_besi"
                                name="sirup_besi" >
                            </div>
                            <div class="form-group">
                                <label for="">Vitamin A </label>
                                <select name="v_a" id="v_a" class="form-control">
                                    <option value="">-- Pilih Vitamin A --</option>
                                    <option value="1_bln">1 BLN</option>
                                    <option value="2_bln">2 BLN</option>
                                </select>
                                <input type="text" class="form-control mt-2" placeholder="Masukan Vit A" id="vit_a" aria-describedby="vit_a"
                                name="vit_a">
                            </div>

                            <div class="form-group">
                                <label for="oralit_bln">Oralit Bln</label>
                                <input type="text" class="form-control" placeholder="Masukan Oralit" id="oralit_bln" aria-describedby="oralit_bln" name="oralit_bln">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">(Pemberian Imunisasi)</label>
                        <div class="form-group">
                            <label for="bcg">BCG</label>
                            <input type="text" class="form-control" placeholder="Masukan BCG" id="bcg" aria-describedby="bcg" name="bcg">
                        </div>
                        <div class="form-group">
                            <label for="">DTP</label>
                            <select name="dtp_2" id="dtp_2" class="form-control">
                                <option value="">-- Pilih DTP --</option>
                                <option value="I">I </option>
                                <option value="II">II </option>
                                <option value="III">III </option>
                            </select>
                            <input type="text" class="form-control mt-2" placeholder="Masukan DTP" id="dtp" aria-describedby="dtp"
                                name="dtp">
                        </div>
                        <div class="form-group">
                            <label for="">Polio</label>
                            <select name="polio_2" id="polio_2" class="form-control">
                                <option value="">-- Pilih Polio --</option>
                                <option value="I">I </option>
                                <option value="II">II </option>
                                <option value="III">III </option>
                                <option value="IV">IV </option>
                            </select>
                            <input type="text" name="polio" id="polio" class="form-control mt-2" placeholder="Masukan Polio">
                            <div class="form-group">
                                <label for="campak" class="mt-2">Campak</label>
                                <input type="text" class="form-control" placeholder="Masukan Campak" id="campak" aria-describedby="campak" name="campak"
                                >
                            </div>
                            <div class="form-group">
                                <label for="hepatitis">Hepatitis</label>
                                <input type="text" class="form-control" placeholder="Masukan Hepatitis" id="hepatitis" aria-describedby="hepatitis" name="hepatitis"
                                >
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_meninggal">Tanggal Meninggal(Optional)</label>
                            <input type="date" class="form-control" placeholder="Masukan Tanggal Meninggal" id="tgl_meninggal" aria-describedby="tgl_meninggal" name="tgl_meninggal"
                            >
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" class="form-control" placeholder="Masukan Keterangan" id="ket" aria-describedby="ket" name="ket"
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
        @if (session('regBayiCreate'))
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
                        title: '{{ session('regBayiCreate') }}'
                    })
            </script>
            @endif
            @if (session('regBayiCreate'))
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
                        title: '{{ session('regBayiCreate ') }}'
                    })
                </script>
            @endif
            @if (session('regBayiDelete'))
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
                        title: '{{ session(' regBayiDelete ') }}'
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
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 , 12,13,14,15,16,17,18]
                            },
                            autoFilter: true,
                            sheetName: 'Exported data'
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12,13,14,15,16,17,18]
                            }
                        },
                        ],
                    } );
                } );
            </script>
        @endpush
    @endsection
