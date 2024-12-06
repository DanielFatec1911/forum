<!-- resources/views/models.blade.php -->

@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<div class="models-container">
    <h2>Modelos Populares</h2>
    <div class="models">
        <div class="model">
            <img src="https://example.com/model1.jpg" alt="Modelo 1">
            <h3>Modelo 1</h3>
            <p>Descrição do Modelo 1</p>
        </div>
        <div class="model">
            <img src="https://example.com/model2.jpg" alt="Modelo 2">
            <h3>Modelo 2</h3>
            <p>Descrição do Modelo 2</p>
        </div>
        <div class="model">
            <img src="https://example.com/model3.jpg" alt="Modelo 3">
            <h3>Modelo 3</h3>
            <p>Descrição do Modelo 3</p>
        </div>
    </div>
</div>
@endsection
