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

        <p>Author: {{ $post->name }}</p>
        <h2>{{ $post->title }}</h2>
        <pre>{{ $post->body }}</pre>

        @foreach($post->categories as $category)



            <p class="text-muted">
                <small>{{ $category->name }}</small>
            </p>


        @endforeach

        <hr>

        <h3>Comments: </h3>

        @if(count($post->comments) == 0)

            <p>This post has no comments.</p>

        @else

            @foreach($post->comments as $comment)

                <div class="well">

                    @if($comment->created_at != $comment->updated_at)

                        <p>Edited: {{ $comment->updated_at->diffForHumans() }}</p>

                    @else

                        <p>Posted: {{ $comment->created_at->diffForHumans() }}</p>

                    @endif

                    <p><b>User: {{ $comment->name }}</b></p>
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

        <h4>Napiši komentar:</h4>
        <form class="form-horizontal" role="form" action="{{ route("save.comment", ["id" => $post->id]) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="control-label col-sm-2" for="body">Comment: </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="7" name="body" id="body" placeholder="Write your blog post"></textarea>
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
