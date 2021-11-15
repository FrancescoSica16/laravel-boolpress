@extends('layouts.app') 

@section('content')

<div class="container">

<div class="card-element">
    <h1 class="card-title">{{$post->title}}</h1>
    <p class="card-body">{{$post->post_content}}</p>

    <address>{{$post->author}}</address>
    <address class="date">{{$post->post_date}}</address>

    <div class="back-to-list">
        <a href="{{route('admin.posts.index')}}">
            Torna alla lista dei post
        </a>       
    </div>
</div>


</div>

@endsection