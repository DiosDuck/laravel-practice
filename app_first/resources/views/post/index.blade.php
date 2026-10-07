<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>
    @foreach($posts as $post)
        @can('update', $post)
            <div>
                <a href="{{ route('post.edit', $post->id) }}">
                    {{ $post->title }}, by {{ $post->user->name }}
                </a>
            </div>
        @endcan
    @endforeach
</body>
</html>
