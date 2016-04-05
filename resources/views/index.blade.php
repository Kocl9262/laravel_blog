@extends("base")

@section("tab_title")

    MyBlog Home

@endsection

@section("page_title")

    MyBlog

@endsection

@section("small_page_title")

    All posts

@endsection

@section("content")

    @foreach($posts as $post)

        <p>Napisal: {{ $post->name }}</p>
        <h2><a href="/objava/{{ $post->id }}">{{ $post->title }}</a></h2>
        <pre>{{ $post->body }}</pre>
        <hr>

    @endforeach
    {!! $posts->links() !!}
@endsection
