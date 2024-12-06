<?php
// web.php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

Route::post('/contact', [HomeController::class, 'contact'])->name('contact'); 
Route::get('/models', [HomeController::class, 'models'])->name('models');

// Rota para a página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rota para o perfil do usuário
Route::get('/profile', [UserController::class, 'viewProfile'])->name('profile');
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Rotas de usuários
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');
    Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/users/{id}/toggle-suspension', [UserController::class, 'toggleSuspension'])->name('user.toggleSuspension');

    // Rotas para posts
    Route::get('/posts', [PostController::class, 'listAllPosts'])->name('listAllPosts');
    Route::get('/posts/create', [PostController::class, 'createPost'])->name('createPost');
    Route::post('/posts', [PostController::class, 'storePost'])->name('storePost');
    Route::get('/posts/{id}', [PostController::class, 'showPost'])->name('showPost');
    Route::get('/posts/{id}/edit', [PostController::class, 'editPost'])->name('editPost');
    Route::put('/posts/{id}', [PostController::class, 'updatePost'])->name('updatePost');
    Route::delete('/posts/{id}', [PostController::class, 'deletePost'])->name('deletePost');

    // Rotas para tópicos
    Route::get('/topics', [TopicController::class, 'listAllTopics'])->name('listAllTopics');
    Route::get('/topics/create', [TopicController::class, 'createTopicForm'])->name('createTopicForm');
    Route::post('/topics', [TopicController::class, 'storeTopic'])->name('storeTopic');
    Route::get('/topics/{id}/edit', [TopicController::class, 'editTopicForm'])->name('editTopicForm');
    Route::put('/topics/{id}', [TopicController::class, 'updateTopic'])->name('updateTopic');
    Route::delete('/topics/{id}', [TopicController::class, 'deleteTopic'])->name('deleteTopic');
    Route::get('/topics/{id}', [TopicController::class, 'showTopic'])->name('showTopic');

    // Rotas para tags
    Route::get('/tags', [TagController::class, 'listAllTags'])->name('listAllTags');
    Route::get('/tags/create', [TagController::class, 'createTagForm'])->name('createTagForm');
    Route::post('/tags', [TagController::class, 'storeTag'])->name('storeTag');
    Route::get('/tags/{id}/edit', [TagController::class, 'editTagForm'])->name('editTagForm');
    Route::put('/tags/{id}', [TagController::class, 'updateTag'])->name('updateTag');
    Route::delete('/tags/{id}', [TagController::class, 'deleteTag'])->name('deleteTag');
    Route::get('/tags/{id}', [TagController::class, 'showTag'])->name('showTag');
    Route::get('/tags/{id}/posts', [TagController::class, 'showPosts'])->name('showPostsByTag');

    // Rotas para categorias
    Route::get('/categories', [CategoryController::class, 'listAllCategories'])->name('listAllCategories');
    Route::get('/categories/create', [CategoryController::class, 'createCategoryForm'])->name('createCategory');
    Route::post('/categories', [CategoryController::class, 'storeCategory'])->name('storeCategory');
    Route::get('/categories/{idCategory}/edit', [CategoryController::class, 'editCategoryForm'])->name('editCategory');
    Route::put('/categories/{idCategory}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::delete('/categories/{idCategory}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/categories/{idCategory}', [CategoryController::class, 'showCategory'])->name('showCategory');
    Route::get('/categories/{idCategory}/posts', [CategoryController::class, 'showPosts'])->name('showPostsByCategory');

    // Rotas para comentários
    Route::prefix('topics/{topicId}/comments')->group(function () {
        Route::post('/', [CommentController::class, 'store'])->name('storeComment');
        Route::get('/{id}/edit', [CommentController::class, 'edit'])->name('editComment');
        Route::put('/{id}', [CommentController::class, 'update'])->name('updateComment');
        Route::delete('/{id}', [CommentController::class, 'destroy'])->name('deleteComment');
        Route::get('/{id}', [CommentController::class, 'show'])->name('comments.show');
    });
});
