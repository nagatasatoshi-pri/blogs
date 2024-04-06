<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <div class="navMenu">
            @auth
            <div class="username">{{ Auth::user()->name }}</div>
            <a class="createPostBtn" href="{{ route('create_post') }}">記事作成</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
            @else
            <a class="loginBtn" href="{{ route('login') }}">ログイン</a>
            <a class="registerBtn" href="{{ route('register') }}">会員登録</a>
            @endauth
        </div>
    </header>

    <div class="space3rem"></div>

    <div class="contentAria">
        <div class="blogAria">
            <div class="blogContent">
                @foreach($posts as $post)
                <div class="blogLink">
                    <a href="{{ route('post_detail', ['id' => $post->id]) }}">
                        <div class="blogStyle">
                            <p class="blogTitle">{{ $post->title }}</p>
                            <div>
                                <p>{{ $post->created_at }}</p>
                                <p>{{ $post->username }}</p>
                            </div>
                        </div>
                        <p class="blogText">{{ $post->content }}</p>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="pagination">
                {{ $posts->links('pagination::default') }}
            </div>

        </div>

    </div>
    </div>

    </div>



</body>

</html>