@extends("base")

@section("title")
    BLA BLA
@endsection

@section("content")

    @foreach($posts as $post)

        <p>Napisal: {{ $post->name }}</p>
        <h2>{{ $post->title }}</h2>
        <pre>{{ $post->body }}</pre>

    @endforeach

@endsection
