@extends('layouts.auth')

@section('auth')
<style>
    .logo-sipandu{
        width: 50%;
        /* height: 50%; */
        margin: -5%;
        margin-left: 25%;
        margin-bottom: 20px;
        border-radius: 15%;
    }
</style>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>LOGIN</b></h1>
                                    </div>
                                    <img src="{{ asset('themes/admin/img/logo_sipandu.jpg') }}" class="logo-sipandu">
                                    <form class="user" action="{{ route('auth.login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                aria-describedby="emailHelp" placeholder="Username" name="username"
                                                autofocus required value="{{ old('username') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                placeholder="Password" name="password" required>
                                        </div>
                                        <input type="submit" name="login" value="login"
                                            class="btn btn-primary btn-user btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('addon-js')
        <script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
        @if (session('loginError'))
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
                    icon: 'error',
                    title: '{{ session('loginError') }}'
                })
            </script>
        @endif
    @endpush
@endsection
