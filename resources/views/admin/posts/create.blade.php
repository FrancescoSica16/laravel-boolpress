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

                {{-- form per aggiungere category --}}
                <div class="form-group">
                    <label for="category_id">Categoria del post</label>
                    <select name="category_id" id="category_id">
                        
                        <option value="">
                            Senza categoria
                        </option>                      
                        @foreach ($categories as $category )                         
                            <option @if (old("category_id") == $category->id) selected  @endif value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach        
                    </select>
                </div>
                 {{-- Fine form per category da rivedere --}}


                {{-- form per TAGS --}}

                <div class="form-check form-check-inline">
                    <legend class="h5">Tags</legend>
                    @foreach ($tags as $tag)
                        <input type="checkbox" class="form-check-input" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]">
                        
                        <label class="form-check-label px-2 " for="tag-{{$tag->id}}">
                            {{$tag->name}}
                        </label>
                    @endforeach
                    

                </div>

                {{-- end form TAGS --}}

                {{-- <div class="form-group">
                    <label for="author">Autore del post</label>
                    <input class="form-control" type="text" placeholder="Inserisci l'autore del post" id="author" name="author" value="{{old("author", $post->author)}}" >
                </div>  questo non serve piu perche inserisco la logica nel controller--}}
                {{-- <div class="form-group">
                    <label for="image_url">Immagine</label>
                    <input class="form-control" type="text" placeholder="Inserisci l'url dell'immagine del post" id="image_url" name="image_url" 
                    value="{{old('image_url', $post->image_url)}}">
                </div> --}}
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