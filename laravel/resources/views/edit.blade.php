@extends('layouts.app')

@section('content')
<body>

    <h1>記事編集</h1>

    <form method="POST" action="{{ route('update_post', ['id' => $post->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">タイトル:</label><br>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div>
            <label for="content">内容:</label><br>
            <textarea id="content" name="content" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit">更新する</button>
    </form>

</body>
@endsection
