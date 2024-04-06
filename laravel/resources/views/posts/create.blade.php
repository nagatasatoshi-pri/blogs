@extends('layouts.app')

@section('content')
<body>

    <form id="postForm" method="POST" action="{{ route('store_post') }}">
        @csrf

        @if(auth()->check())
        <p>ユーザー名: {{ auth()->user()->name }}</p>
    @endif

        @if(auth()->check())
            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
        @endif
        <div>
            <label for="title">タイトル:</label><br>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">内容:</label><br>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">投稿する</button>
    </form>

</body>
@endsection
