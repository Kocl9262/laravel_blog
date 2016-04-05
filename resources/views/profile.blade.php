@extends("base")

@section("tab_title")

    MyBlog - Profile

@endsection

@section("page_title")

    User:
    @foreach($users as $user)
        {{ $user->name }}
    @endforeach

@endsection

@section("small_page_title")



@endsection

@section("content")

    @foreach($users as $user)

        <h2>{{ $user->email }}</h2>
        <pre>{{ $user->role_id }}</pre>

        @foreach($user->role as $role)
            {{ $role->name }}
        @endforeach

    @endforeach

@endsection
