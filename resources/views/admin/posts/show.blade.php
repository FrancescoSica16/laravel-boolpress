@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <h1 class="card-title"> {{$post->title}} </h1>
            <address class="card-subtitle"> di {{ $post->author }} </address>
            <address>
                @if ($post->category) 
                    <span class="badge badge-primary">{{$post->category->name}} </span>
                @else Nessuna categoria
                @endif                       
            </address>
            <address class="card-subtitle date"> {{ $post->post_date}} </address>

            <p class="card-body"> {{$post->post_content}} </p>
            <div class="card-footer back-to-list">
                <a href="{{route('admin.posts.index')}}" class="btn btn-toolbar">Torna alla lista dei post</a>
            </div>
            
        </div>
    </div>
@endsection