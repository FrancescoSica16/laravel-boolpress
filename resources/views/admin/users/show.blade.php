@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">

            <h1 class="card-title"> {{$user->name}} </h1>
            <address class="card-subtitle">User ID : {{ $user->id }} </address>
            <address>{{$user->roles->name}}</address>
            <p class="card-body"> {{$user->email}} </p>

            <div class="card-footer back-to-list">
                <a href="{{route('admin.users.index')}}" class="btn btn-toolbar">Torna alla lista degli utenti</a>
            </div>
            
        </div>
    </div>
@endsection