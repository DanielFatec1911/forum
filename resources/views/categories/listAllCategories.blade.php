@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/category/listAllCategories.css') }}">

<div class="categories-container">
    <h1>Todas as Categorias</h1>
    <div class="categories-list">
        @foreach($categories as $category)
            <div class="category-item">
                <h2>
                    <a href="{{ route('showCategory', ['idCategory' => $category->idCategory]) }}">{{ $category->name }}</a>
                </h2>
                <p>{{ \Illuminate\Support\Str::limit($category->description, 150, $end='...') }}</p>
                <a href="{{ route('editCategory', ['idCategory' => $category->idCategory]) }}" class="button button-edit">Editar</a>
                <form action="{{ route('deleteCategory', ['idCategory' => $category->idCategory]) }}" method="POST" class="inline-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button button-delete">Deletar</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
