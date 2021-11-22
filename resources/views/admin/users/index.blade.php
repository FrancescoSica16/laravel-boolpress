@extends('layouts.app')

@section('content')
    <div class="container p-5">

        @if (session("deleted_title"))
            <div class="alert alert-warning">
                {{session('alert-message')}}
            </div>
        @endif

        <header class="p-3">
            <h1>Utenti registrati</h1>
            <a href="{{route("admin.users.create")}}">Crea nuovo utente</a>
        </header>

        <table class="table table-bordered">
            <thead>
                <th class="col-1">ID</th>
                <th class="col-3">Nome</th>
                <th class="col-3">E-mail</th>
                <th class="col-3">Ruolo</th>
                <th class="col-1"></th>
                <th class="col-1"></th>

            </thead>
            <tbody> 
                @forelse ($users as $user)
                    <tr>
                        <td><a href="{{ route('admin.users.show', $user->id ) }}">{{ $user->id }}</a></td>     
                                      
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>  {{-- riga Role --}}
                            @forelse ($user->roles as $role)
                                {{$role->name}}
                            @empty    
                            -                       
                            @endforelse </td>
                        <td><a href="{{ route('admin.users.edit', $user ) }}" class="btn btn-secondary">Modifica</a></td>
                        <td>
                            <form action="{{route('admin.users.destroy', $user->id )}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger " type="submit">Elimina</a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Non ci sono utenti da visualizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        

    </div>
@endsection