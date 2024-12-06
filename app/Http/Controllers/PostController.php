<?php

// app/Http/Controllers/PostController.php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function listAllPosts()
    {
        $posts = Post::with(['user', 'category', 'tags'])->get();
        return view('posts.listAllPosts', ['posts' => $posts]);
    }

    public function createPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.createPost', compact('categories', 'tags'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();
        $post->tags()->attach($request->tags);

        return redirect()->route('listAllPosts')->with('message-success', 'Post criado com sucesso!');
    }

    public function showPost($id)
    {
        $post = Post::with(['user', 'category', 'tags'])->findOrFail($id);
        return view('posts.showPost', ['post' => $post]);
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.editPost', compact('post', 'categories', 'tags'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('listAllPosts')->with('message-success', 'Post atualizado com sucesso!');
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('listAllPosts')->with('message-success', 'Post deletado com sucesso!');
    }
}
