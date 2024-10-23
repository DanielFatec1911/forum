@extends('layouts.header_footer')
@section('content')

<div class="create-post-container">
    
    <form action="{{route('register')}}" method="POST" class="create-post-form">
        <h2 class="create-post-title">Editar Post</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Titulo do Post:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old("title") }}" required>
            @error("title") <span>{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label for="category" class="form-label">Categoria do Post:</label>
            <select id="category" name="category" class="form-input" required>
                <option value="">Selecione uma categoria</option>
                <option value="Suzuki">Suzuki</option>
                <option value="BMW">BMW</option>
                <option value="Honda">Honda</option>
                <option value="Yamaha">Yamaha</option>
                <option value="Ducati">Ducati</option>
                <option value="KTM">KTM</option>
                <option value="Kawasaki">Kawasaki</option>
                <option value="Dafra">Dafra</option>
            </select>
            @error('category') <span>{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="tag" class="form-label">Tags do Post:</label>
            <select id="tag" name="tag" class="form-input" required>
                <option value="">Selecione tags</option>
                <option value="Suzuki">#Suzuki</option>
                <option value="BMW">#BMW</option>
                <option value="Honda">#Honda</option>
                <option value="Yamaha">#Yamaha</option>
                <option value="Ducati">#Ducati</option>
                <option value="KTM">#KTM</option>
                <option value="Kawasaki">#Kawasaki</option>
                <option value="Dafra">#Dafra</option>
            </select>
            @error('tag') <span>{{ $message }}</span> @enderror
        </div>     
    
        <div class="form-group">
            <label for="text" class="form-label">Texto do Post:</label>
            <textarea id="text" name="text" class="form-input" required>{{ old('text') }}</textarea>
            @error('text') <span>{{ $message }}</span> @enderror
        </div>
    
        <input type="submit" class="submit-button" value="Enviar">
        <br>
        <button href="./editPost.blade.php" type="submit" class="submit-button">Editar Post</button>
    </form>
</div>
@endsection
