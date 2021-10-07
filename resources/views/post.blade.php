<html>
    <head>
        {{ $post->title }}
    </head>
    <body>
        <a href="/posts">Go to Posts page</a>
        <h2>
            {{ $post->title }}
        </h2>

        <p>
            {{ $post->body }}
        </p>
    </body>
</html>
