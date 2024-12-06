<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $tags = Tag::limit(50)->get(); // Limite de tags
        $posts = Post::latest()->take(5)->get(); // Limite de posts

        Log::info('Tags:', $tags->toArray());

        return view('home', compact('tags', 'posts'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Processamento do formulário de contato
        return redirect()->route('home')->with('message-success', 'Mensagem enviada com sucesso!');
    }

    public function models()
    {
        return view('models');
    }
}
