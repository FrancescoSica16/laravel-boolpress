@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei viaggi</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>luogo</th>
                    <th>data partenza</th>
                    <th>prezzo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($travels as $travel )              
                <tr>
                    <td>{{$travel->location}}</td>
                    <td>{{$travel->date_start}}</td>
                    <td>{{$travel->price}}</td>
                    {{-- <td><a href="{{route('admin.travels.show', $travel->id)}}">Vai al viaggio</a></td> --}}
                </tr>
            
                @empty
                    <tr>Non ci sono viaggi da mostrare</tr>
                @endforelse
               
            </tbody>
        </table>

    </div>
@endsection