<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.min.css') }}" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-10 col-lg-8 col-xl-6">
                        <div class="card mb-0 shadow">
                            <div class="card-body">
                                <h4 class="text-center mb-4">Edit Profil</h4>

                                {{-- Notifikasi sukses --}}
                                @if (session('status') === 'profile-updated')
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Profil berhasil diperbarui.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif

                                {{-- Error validasi --}}
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                                @endif

                                {{-- Form update profil --}}
                                <form method="POST" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('PATCH')

                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                            class="form-control" required autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}" class="form-control"
                                            required>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3">Simpan
                                        Perubahan</button>
                                </form>

                                <hr class="my-4">

                                {{-- Form ubah password --}}
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <h5 class="mb-3">Ubah Password</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Password Lama</label>
                                        <input type="password" name="current_password" class="form-control" required
                                            autocomplete="current-password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password Baru</label>
                                        <input type="password" name="password" class="form-control" required
                                            autocomplete="new-password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            required autocomplete="new-password">
                                    </div>

                                    <button type="submit" class="btn btn-warning w-100 py-2">Ubah Password</button>
                                </form>

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