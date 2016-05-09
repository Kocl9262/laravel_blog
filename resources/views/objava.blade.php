@extends("base")

@section("tab_title")

    MyBlog - Current post

@endsection

@section("page_title")

    MyBlog

@endsection

@section("small_page_title")

    Current post

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

        <h2>{{ $post->title }}</h2>

        <div class="text-muted">
            Categories:
            @foreach($post->categories as $category)

                <small>{{ $category->name }}, </small>

            @endforeach
        </div>

        <p class="well">{{ $post->body }}</p>

        <hr>

        <h3>Comments: </h3>

        @if(count($post->comments) == 0)

            <p>This post has no comments.</p>

        @else

            @foreach($post->comments as $comment)

                <div class="well">

                    <div>

                        <p class="inline_p">{{ $comment->name }}</p>
                        @if($comment->created_at != $comment->updated_at)

                            <p class="inline_p pull_right">Edited: {{ $comment->updated_at->diffForHumans() }}</p>

                        @else

                            <p class="inline_p pull_right">Posted: {{ $comment->created_at->diffForHumans() }}</p>

                        @endif

                    </div>
                    <hr>
                    <p>{{ $comment->body }}</p>

                </div>

            @endforeach



        @endif

    @endforeach

    <br>
    <hr>
    <br>
    @if (Auth::guest())
        <div class="well">
            <p>To add comment you must be logged in</p>
        </div>
    @else

        <form class="form-horizontal" role="form" action="{{ route("save.comment", ["id" => $post->id]) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="control-label col-sm-2" for="body">Comment: </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="7" name="body" id="body" placeholder="Comment"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Comment</button>
                </div>
            </div>
        </form>

    @endif

@endsection
