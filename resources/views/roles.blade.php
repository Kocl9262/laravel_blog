@extends("base")

@section("tab_title")

    Roles

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

    Roles

@endsection

@section("content")

    Existing roles:
    @foreach($roles as $role)
        {{ $role->name }},
    @endforeach

    <hr>

    <form class="form-horizontal" role="form" action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Add role: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Add new role">
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
