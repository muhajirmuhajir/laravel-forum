<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'content' => $request->content
        ]);

        return back();
    }
}
