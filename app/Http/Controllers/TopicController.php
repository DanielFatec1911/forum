<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function listAllTopics()
    {
        $topics = Topic::all();
        return view('topics.listAllTopics', compact('topics'));
    }

    public function createTopicForm()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('topics.createTopic', ['categories' => $categories, 'tags' => $tags]);
    }

    public function storeTopic(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $topic = Topic::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        if ($request->has('tags')) {
            $topic->tags()->sync($request->tags);
        }

        return redirect()->route('listAllTopics')->with('message-success', 'Tópico criado com sucesso!');
    }

    public function editTopicForm($id)
    {
        $topic = Topic::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('topics.editTopic', ['topic' => $topic, 'categories' => $categories, 'tags' => $tags]);
    }

    public function updateTopic(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $topic = Topic::findOrFail($id);
        $topic->update($request->all());

        if ($request->has('tags')) {
            $topic->tags()->sync($request->tags);
        }

        return redirect()->route('listAllTopics')->with('message-success', 'Tópico atualizado com sucesso!');
    }

    public function deleteTopic($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('listAllTopics')->with('message-success', 'Tópico deletado com sucesso!');
    }

    public function showTopic($id)
    {
        $topic = Topic::with(['user', 'category', 'tags', 'comments.user'])->findOrFail($id);
        return view('topics.showTopic', compact('topic'));
    }
}
