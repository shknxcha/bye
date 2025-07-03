<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.min.css') }}">
</head>

<body>
    <div class="page-wrapper" id="main-wrapper">
        <div class="min-vh-100 d-flex align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                            <img src="{{ asset('admin/assets/images/logos/logo.svg') }}" alt="Logo">
                        </a>
                        <p class="text-center">Lupa password?</p>

                        {{-- Session Status --}}
                        @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                        @endif

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                            @endforeach
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" class="form-control"
                                    value="{{ old('email') }}" required autofocus>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Send Reset Link
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>