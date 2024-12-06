<?php
// app/Http/Controllers/TagController.php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function listAllTags()
    {
        $tags = Tag::all();
        return view('tags.listAllTags', compact('tags'));
    }

    public function createTagForm()
    {
        return view('tags.createTag');
    }

    public function storeTag(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create($request->all());

        return redirect()->route('listAllTags')->with('message-success', 'Tag criada com sucesso!');
    }

    public function editTagForm($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.editTagForm', compact('tag'));
    }
    
    public function updateTag(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update($request->all());

        return redirect()->route('listAllTags')->with('message-success', 'Tag atualizada com sucesso!');
    }

    public function deleteTag($id)
    {
        Tag::findOrFail($id)->delete();
        return redirect()->route('listAllTags')->with('message-success', 'Tag deletada com sucesso!');
    }

    public function showTag($id) { $tag = Tag::with('posts.user', 'posts.category')->findOrFail($id); return view('tags.showTag', compact('tag')); }

    // Método para exibir todos os posts associados a uma tag específica
    public function showPosts($id)
    {
        $tag = Tag::with('posts.user', 'posts.category')->findOrFail($id);
        return view('tags.showPosts', ['tag' => $tag]);
    }
}
