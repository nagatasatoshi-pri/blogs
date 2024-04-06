@extends('layouts.app')

@section('content')
<div class="loginContent">
    <div class="container">
        <div class="cardTitle">会員登録</div>

        <div class="cardBody">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="formItem">
                    <label for="name">名前</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="formItem">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="formItem">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="formItem">
                    <label for="password-confirm">パスワード（再入力）</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="submitBtn">
                    <button type="submit" class="btn btn-primary">
                        登録する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
