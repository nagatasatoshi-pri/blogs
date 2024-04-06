@extends('layouts.app')

@section('content')

@if (Session::has('login_success'))
    <div class="alert alert-success">
        {{ Session::get('login_success') }}
    </div>
@endif

<div class="loginContent">
    <div class="container">
        <div class="cardTitle">Login</div>
        <div class="cardBody">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="formItem">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Eメールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="formItem">
                    <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="submitBtn">
                    <button type="submit" class="btn btn-primary">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
