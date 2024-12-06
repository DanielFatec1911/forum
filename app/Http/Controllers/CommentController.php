<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $topicId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'content' => $request->content,
            'topic_id' => $topicId,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('showTopic', ['id' => $topicId])->with('success', 'Comentário adicionado com sucesso!');
    }

    public function edit($topicId, $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.editComment', compact('comment', 'topicId'));
    }

    public function update(Request $request, $topicId, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->only('content'));

        return redirect()->route('showTopic', ['id' => $topicId])->with('success', 'Comentário atualizado com sucesso!');
    }

    public function destroy($topicId, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('showTopic', ['id' => $topicId])->with('success', 'Comentário deletado com sucesso!');
    }

    public function show($topicId, $id)
    {
        $comment = Comment::with('user')->findOrFail($id);
        return view('comments.showComment', compact('comment', 'topicId'));
    }
}
