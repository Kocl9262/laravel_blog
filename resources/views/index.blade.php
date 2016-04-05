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

        <div>

            <p class="inline_p">Blogger: {{ $post->name }}</p>
            @if($post->created_at != $post->updated_at)

                <p class="inline_p pull_right">Edited: {{ $post->updated_at->diffForHumans() }}</p>

            @else

                <p class="inline_p pull_right">Posted: {{ $post->created_at->diffForHumans() }}</p>

            @endif

        </div>
        <h2><a href="/objava/{{ $post->id }}">{{ $post->title }}</a></h2>
        <p class="well">{{ str_limit($post->body, $limit = 500, $end = '...') }}</p>
        <hr>

    @endforeach

    {!! $posts->links() !!}

@endsection
