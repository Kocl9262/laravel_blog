@extends("base")

@section("tab_title")

    Categories

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

    Categories

@endsection

@section("content")

    Existing categories:
    @foreach($categories as $category)
        {{ $category->name }},
    @endforeach

    <hr>

    <form class="form-horizontal" role="form" action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Add category: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Add new category">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Add</button>
            </div>
        </div>
    </form>

@endsection

@endif
