@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei post</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post )              
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->author}}</td>
                    <td>{{$post->post_date}}</td>
                    <td><a href="{{route('admin.posts.show', $post->id)}}">Vai al post</a></td>
                </tr>
            
                @empty
                    <tr>Non ci sono post da mostrare</tr>
                @endforelse
               
            </tbody>
        </table>

    </div>
@endsection