<h1>{{ $post->title }}</h1>

<p>{{ $post->content }}</p>
<form method="POST" action="/posts">
    @csrf

    <input type="text" name="title" placeholder="Title">

    <textarea name="content"></textarea>

    <button type="submit">Create Post</button>
</form>