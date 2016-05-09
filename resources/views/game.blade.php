@extends("base")

@section("tab_title")

    MyBlog Game

@endsection

@section("page_title")

    MyBlog

@endsection

@section("small_page_title")

    Game

@endsection

@section("content")

    <h2>Enter random number from 1 to 100 and see if computer can find it in 7 tries.</h2>
    <form name="checkListForm">
        <input type="text" name="checkListItem" />
    </form>
    <div id="button">Enter!</div>
    <div id="button2">Clear</div>
    <br/>
    <div class="list"></div>

@endsection