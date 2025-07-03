<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.min.css') }}" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('admin/assets/images/logos/logo.svg') }}" alt="logo">
                                </a>
                                <p class="text-center">Reset Your Password</p>

                                {{-- Menampilkan pesan sukses --}}
                                @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                                @endif

                                {{-- Menampilkan error --}}
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                                @endif

                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf

                                    <!-- Token reset password -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $request->email) }}" required autofocus>
                                    </div>

                                    <!-- Password baru -->
                                    <div class="mb-3">
                                        <label class="form-label">Password Baru</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <!-- Konfirmasi Password -->
                                    <div class="mb-4">
                                        <label class="form-label">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            required>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Reset
                                        Password</button>
                                </form>

                                <div class="text-center">
                                    <a class="text-primary fw-bold" href="{{ route('login') }}">Kembali ke login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>