<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Posting</title>
</head>
<body>
    <h2>New Post Published</h2>

    <p>Title: {{ $post->title }}</p>
    <p>Description: {{ $post->description }}</p>
    <p>Website: {{ $post->website->webname }}</p>
    <p>Publisher: {{ $post->account->username }}</p>
</body>
</html>
