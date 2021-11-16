@extends('layouts.app')

@section('content')

    <div class="container">
        <header>
            <h1>Crea un nuovo post</h1>
        </header>

        <section id="post-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>        
            @endif
            <form action="{{route('admin.posts.store')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="title">Titolo del post</label>
                    <input class="form-control form-control-lg" type="text" 
                    placeholder="Inserisci il titolo del post" id="title" name="title" value="{{ old('title', $post->title) }}">
                    {{-- old() richiede come primo parametro [obbligatorio] il valore da inserire quando torna alla compilazione con errori, se questo è vuoto inserisci il secondo parametro [facoltativo] --}}
                </div>
                <div class="form-group">
                    <label for="author">Autore del post</label>
                    <input class="form-control" type="text" placeholder="Inserisci l'autore del post" id="author" name="author" value="{{old("author", $post->author)}}" >
                </div>
                <div class="form-group">
                    <label for="image_url">Immagine</label>
                    <input class="form-control" type="text" placeholder="Inserisci l'url dell'immagine del post" id="image_url" name="image_url" 
                    value="{{old('image_url', $post->image_url)}}">
                </div>
                <div class="form-group">
                    <label for="post_content">Contenuto del post</label>
                    <textarea  class="form-control" type="textarea" placeholder="Inserisci il contenuto del post" id="post_content" name="post_content" >{{old('post_content', $post->post_content) }} </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Crea</button>
                <button type="reset" class="btn btn-secondary">Cancella i dati</button>
            </form>
        </section>
    </div>
    
@endsection