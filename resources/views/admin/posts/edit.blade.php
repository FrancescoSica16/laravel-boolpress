@extends('layouts.app')

@section('content')

    <div class="container">
        <header>
            <h1>Modifica il post {{ $post->title }}</h1>
        </header>

        <section id="post-form">
            <form action="{{route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="title">Titolo del post</label>
                    <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" id="title" name="title" value="{{$post->title}}" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Categoria del post</label>
                    <select name="category_id" id="category_id">
                        
                        <option value="">
                            Senza categoria
                        </option>                      
                        @foreach ($categories as $category )                         
                            <option {{ $post->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach        
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="author">Autore del post</label>
                    <input class="form-control" type="text" placeholder="Default input" id="author" name="author" value="{{$post->author->name}}" required>
                </div> --}}
                <div class="form-group">
                    <label for="image">Immagine</label>
                    <input class="form-control" type="file" placeholder="Image url" id="image" name="image" value="{{$post->image_url}}" required>
                </div>
                <div class="form-group">
                    <label for="post_content">Contenuto del post</label>
                    <textarea  class="form-control" type="textarea" placeholder="" id="post_content" name="post_content" required>{{$post->post_content}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Modifica</button>
                <button type="reset" class="btn btn-secondary">Cancella i dati</button>
            </form>
        </section>
    </div>
    
@endsection