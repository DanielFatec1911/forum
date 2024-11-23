<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($topicId)
    {
        $topic = Topic::findOrFail($topicId);
        $comments = Comment::where('topic_id', $topicId)->get();
        return view('comments.index', compact('topic', 'comments'));
    }

    public function show($topicId, $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment'));
    }

    public function create($topicId)
    {
        $topic = Topic::findOrFail($topicId);
        return view('comments.create', compact('topic'));
    }

    public function store(Request $request, $topicId)
    {
        $request->validate([
            'content' => 'required',
        ]);
    
        Comment::create([
            'content' => $request->content,
            'topic_id' => $topicId,
            'user_id' => auth()->id(),
        ]);
    
        return redirect()->route('comments.index', ['topicId' => $topicId]);
    }

    public function edit($topicId, $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment', 'topicId'));
    }

    public function update(Request $request, $topicId, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->only('content'));

        return redirect()->route('comments.show', ['topicId' => $topicId, 'id' => $id]);
    }

    public function destroy($topicId, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index', ['topicId' => $topicId]);
    }
}
