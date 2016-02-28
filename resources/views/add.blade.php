@extends("base")

@section("tab_title")

    Add new post

@endsection

@section("page_title")

    Add new post

@endsection

@section("content")

    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Writer: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Post title: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="Enter post title">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="img">Post image: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="img" placeholder="Link to 900x300 image">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="post">Post: </label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="7" id="post" placeholder="Write your blog post"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>

@endsection
