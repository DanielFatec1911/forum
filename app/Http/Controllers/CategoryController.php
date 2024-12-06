<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listAllCategories()
    {
        $categories = Category::all();
        return view('categories.listAllCategories', ['categories' => $categories]);
    }

    public function createCategoryForm()
    {
        return view('categories.createCategory');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('listAllCategories')->with('success', 'Categoria criada com sucesso!');
    }

    public function editCategoryForm($idCategory)
    {
        $category = Category::findOrFail($idCategory);
        return view('categories.editCategory', ['category' => $category]);
    }

    public function updateCategory(Request $request, $idCategory)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $category = Category::findOrFail($idCategory);
    $category->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    // Redirecionar para listAllCategories após a edição
    return redirect()->route('listAllCategories')->with('success', 'Categoria atualizada com sucesso!');


    }

    public function deleteCategory($idCategory)
    {
        $category = Category::findOrFail($idCategory);
        $category->delete();

        return redirect()->route('listAllCategories')->with('success', 'Categoria deletada com sucesso!');
    }

    public function showTag($id) { $tag = Tag::with('posts.user', 'posts.category')->findOrFail($id); return view('tags.showTag', compact('tag')); }

    // Método para exibir todos os posts associados a uma categoria específica
    public function showCategory($idCategory) 
    {  
        $category = Category::with('posts.user', 'posts.tags')->findOrFail($idCategory); return view('categories.showCategory', ['category' => $category]); 
    }
}
