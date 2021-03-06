@extends('layouts.app')

@section('content')
    <div class="container p-5">

        @if (session("deleted_title"))
            <div class="alert alert-warning">
                {{session('alert-message')}}
            </div>
        @endif

        <header class="p-3">
            <h1>Post pubblicati</h1>

            @auth
            <a href="{{route("admin.posts.create")}}">Crea nuovo post</a>
            @endauth
            
        </header>

        <table class="table table-bordered">
            <thead>
                <th class="col">Titolo</th>
                <th class="col">Categoria</th>
                <th class="col">Tags</th> 
                <th class="col">Di</th>
                <th class="col">Scritto il</th>
            </thead>
            <tbody> 
                @forelse ($posts as $post)
                    <tr>
                        <td><a href="{{ route('posts.show', $post->id ) }}">{{ $post->title }}</a></td>

                        {{-- aggiungere categoria --}}
                        <td>
                            @if ($post->category) 
                                <span class="badge badge-primary">{{$post->category->name}} </span>
                            @else Nessuna categoria
                            @endif                       
                        </td>

                        <td>
                            {{-- riga Tags --}}
                            @forelse ($post->tags as $item)
                                {{$item->name}}
                            @empty                           
                            @endforelse
                        </td>

                        
                        <td>{{ $post->author->name}}</td>
                        <td>{{ $post->post_date}}</td>
                        @auth
                            
                        
                        <td><a href="{{ route('admin.posts.edit', $post ) }}" class="btn btn-secondary">Modifica</a></td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post->id )}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger " type="submit">Elimina</a>
                            </form>
                        </td>
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Non ci sono post da visualizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <footer class="footer p-3">
            {{$posts->links()}}
        </footer>
        

    </div>
@endsection