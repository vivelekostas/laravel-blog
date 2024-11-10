<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('personal.comment.index', [
            'comments' => auth()->user()->comments
        ]);
    }

    public function edit(Comment $comment)
    {
        return view('personal.comment.edit', [
            'comment' => $comment
        ]);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('personal.comment.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('personal.comment.index');
    }
}
