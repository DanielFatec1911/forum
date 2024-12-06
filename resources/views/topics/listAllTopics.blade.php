@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/topic/listAllTopics.css') }}">

<div class="topics-container">
    <h1>Todos os Tópicos</h1>
    <div class="topics-list">
        @foreach($topics as $topic)
            <div class="topic-item">
                <h2>
                    <a href="{{ route('showTopic', ['id' => $topic->id]) }}">{{ $topic->title }}</a>
                </h2>
                <p>{{ \Illuminate\Support\Str::limit($topic->description, 150, $end='...') }}</p>
                <a href="{{ route('editTopicForm', ['id' => $topic->id]) }}" class="button">Editar</a>
                <form action="{{ route('deleteTopic', ['id' => $topic->id]) }}" method="POST" class="inline-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button button-delete">Deletar</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
