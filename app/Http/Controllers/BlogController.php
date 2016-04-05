<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class BlogController extends Controller
{
    public function blog()
    {

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);


        return view("index", ["posts" => $posts]);
    }

    public function shranjeno()
    {
        return view("shranjeno");
    }

    public function about()
    {
        return view("about");
    }

    public function objava()
    {
        return view("objava");
    }

    public function form()
    {
        $categories = Category::all();
        return view("form", ["categories" => $categories]);
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view("objava", ["posts" => [$post]]);
    }

    public function store()
    {
        $post = new Post;
        $post->name = Auth::user()->name;
        $post->title = Request::get("title");
        $post->body = Request::get("body");

        $post->save();

        $categories = Request::get('categories');
        if($categories != null)
        {
            for($i = 0; $i < count($categories); $i++)
            {
                $category = Category::find($categories[$i]);
                $category->posts()->attach($post->id);
            }
        }

        return redirect("/");
    }

    public function storeComment($id)
    {

        $comment = new Comment;
        $comment->post_id = $id;
        $comment->name = Auth::user()->name;
        $comment->body = Request::get("body");

        $comment->save();

        return redirect("objava/" . $id);
    }

    public function roles()
    {
        $roles = Role::all();

        return view("roles", ["roles" => $roles]);
    }

    public function storeRole()
    {
        $role = new Role;
        $role->name = Request::get("name");

        $role->save();

        return redirect("roles");
    }

    public function categories()
    {
        $categories = Category::all();

        return view("categories", ["categories" => $categories]);
    }

    public function storeCategory()
    {
        $category = new Category;
        $category->name = Request::get("name");

        $category->save();

        return redirect("categories");
    }
    public function profile($id)
    {
        $user = User::find($id);

        return view("profile", ["users" => [$user]]);
    }
}
