<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
</head>

<body>

    <nav>
        <ul>
            <li><a href="{{ route('blog') }}">TOPページ</a></li>
        </ul>
    </nav>


    <div class="contentAria">
        <div class="blogAria">
            @if($post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <div class="contentData">
                <p>投稿日時: {{ $post->created_at }}</p>
                <p>投稿者: {{ $post->username }}</p>
            </div>
            @endif
        </div>

        <div class="commentAria">
            <h3>コメント</h3>
            @foreach($comments as $comment)
            <div>
                <p class="name">投稿者: {{ $comment->user->name }}</p>
                <p class="comment">{{ $comment->content }}</p>
                <div class="dataAndDelete">
                    <p class="day">投稿日時: {{ $comment->created_at }}</p>
                    <!-- ここに削除ボタンを追加 -->
                    @if(auth()->check() && auth()->user()->id == $comment->user_id)
                    <form method="POST" action="{{ route('delete_comment', ['id' => $comment->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">削除する</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @auth
        <div class="commentUpAria">
            <h3>コメントを投稿する</h3>
            <form method="POST" action="{{ route('store_comment', ['post_id' => $post->id]) }}">
                @csrf
                <textarea name="content" required></textarea>
                <button type="submit">コメントする</button>
            </form>
        </div>
        @else
        <p>コメントを投稿するにはログインしてください。</p>
        @endauth

        <!-- 記事削除ボタン -->
        @auth
        @if(auth()->check() && auth()->user()->id == $post->user_id)
        <form method="POST" action="{{ route('delete_post', ['id' => $post->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="deleteButton">投稿を削除</button>
        </form>
        <!-- 記事編集ボタン -->
        <a class="editButton" href="{{ route('edit_post', ['id' => $post->id]) }}">記事を編集</a>
        @endif
        @endauth
    </div>

</body>

</html>
