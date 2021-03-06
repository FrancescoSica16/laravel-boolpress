@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <h1 class="card-title"> {{$post->title}} </h1>
            <address class="card-subtitle"> di {{ $post->author->name }} </address>
            <address>
                @if ($post->category) 
                    <span class="badge badge-primary">{{$post->category->name}} </span>
                @else Nessuna categoria
                @endif                       
            </address>
            <address class="card-subtitle date"> {{ $post->post_date}} </address>
            <img src="{{asset('storage/'. $post->image_url) }}" alt="" class="img-fluid">
            <p class="card-body"> {{$post->post_content}} </p>
            <div class="card-footer back-to-list">
                <a href="{{route('posts.index')}}" class="btn btn-toolbar">Torna alla lista dei post</a>
            </div>
            
        </div>
    </div>
@endsection