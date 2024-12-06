@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tag/listAllTags.css') }}">

<div class="tags-container">
    <h1>Todas as Tags</h1>
    <div class="tags-list">
        @foreach($tags as $tag)
            <div class="tag-item">
                <h2>
                    <a href="{{ route('showTag', ['id' => $tag->id]) }}">{{ $tag->name }}</a>
                </h2>
                <a href="{{ route('editTagForm', ['id' => $tag->id]) }}" class="button button-edit">Editar</a>
                <form action="{{ route('deleteTag', ['id' => $tag->id]) }}" method="POST" class="inline-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button button-delete">Deletar</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
