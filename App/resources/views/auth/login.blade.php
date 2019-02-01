@extends('layouts.login')

@section('content')

<body class="login bg-white">
    <!-- Page Content -->
    <div class="container">
        <!-- Heading Pagination -->
        <div class="row">
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <h1 class="mb-5"><img src="/img/logo/logoA.png"></h1>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <label for="name" class="input-group-text"><i class="fas fa-user"></i></label>
                        </div>
                        <input class="form-control" placeholder="LOGIN ID" id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <label for="password" class="input-group-text"><i class="fas fa-lock"></i></label>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="PASSWORD" required>
                    </div>
                    <!-- <input type="submit" class="btn btn-dark btn-block mt-4" value="サインイン"> -->
                    <button type="submit" class="btn btn-dark btn-block mt-4">{{ __('サインイン') }}</button>
                </form>
            </div>
        </div>
        <!-- /.row .my-3 -->
    </div>

    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Clip Board Javascript -->
    <script src="{{ asset('vendor/clipboard/clipboard.min.js') }}"></script>

    <!-- Custom Javascriopt -->
    <script src="{{ asset('js/main.js') }}"></script>


@endsection
