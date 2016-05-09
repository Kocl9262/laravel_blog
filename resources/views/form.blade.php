@extends("base")

@section("tab_title")

    Add new post

@endsection



@if (Auth::guest())

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Please register to be able to post</h1>
            </div>
        </div>
    </div>

@else

    @section("page_title")

        Add new post

    @endsection

    @section("content")

        <form class="form-horizontal" role="form" action="" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="control-label col-sm-2" for="title">Title: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="body">Body: </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="7" name="body" id="body" placeholder="Write your blog post"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="categories">Categories: </label>
                @foreach($categories as $category)

                    <input type="checkbox" name="categories[]" class="checkbox input_box" value="{{ $category->id }}"> {{ $category->name }},

                @endforeach
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>

    @endsection

@endif


