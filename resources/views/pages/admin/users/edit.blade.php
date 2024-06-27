@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <p class="mb-4">Manajemen Edit User</p>

    <div class="card shadow">
        <div class="card-header">
            <h4>Edit</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $edit->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap"
                                    name="nama_lengkap" value="{{ $edit->nama_lengkap }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" aria-describedby="username"
                                    name="username" value="{{ $edit->username }}">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">

                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $edit->email }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="level">Role</label>

                        <select name="level" id="level" class="form-control">

                            <option value="">--Pilih Role--</option>

                            <option value="ADMIN" {{ $edit->level == 'ADMIN' ? 'selected' : '' }}>Admin</option>
                            {{-- <option value="DOKTER" {{ $edit->level == 'DOKTER' ? 'selected' : '' }}>Dokter</option>
                            <option value="APOTEKER" {{ $edit->level == 'APOTEKER' ? 'selected' : '' }}>Apoteker --}}
                            <option value="DESA" {{ $edit->level == 'DESA' ? 'selected' : '' }}>Desa
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('user.index') }}" type="button" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
