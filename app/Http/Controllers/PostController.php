<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.user')->latest()->get();

        return view('pages.dashboard', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        Post::create([
            'user_id' => Auth::user()->id,
            'content' => $request->content
        ]);

        return back();
    }
}
