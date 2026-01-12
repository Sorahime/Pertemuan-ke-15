@extends('layouts.app')

@section('content')

<h2>{{ $ticket->title }}</h2>

<p><b>Lokasi:</b> {{ $ticket->location }}</p>
<p><b>Deskripsi:</b> {{ $ticket->description }}</p>
<p><b>Status:</b> {{ $ticket->status }}</p>

@if($ticket->image_path)
<img src="{{ asset('storage/'.$ticket->image_path) }}" width="300">
@endif

<hr>
    {{-- ADMIN: UPDATE STATUS --}}
    @if(auth()->user()->is_admin)
    <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
        @csrf
        @method('PUT')

        <select name="status">
            <option {{ $ticket->status=='Pending'?'selected':'' }}>Pending</option>
            <option {{ $ticket->status=='In Progress'?'selected':'' }}>In Progress</option>
            <option {{ $ticket->status=='Resolved'?'selected':'' }}>Resolved</option>
        </select>

        <button type="submit">Update Status</button>
    </form>
<hr>
@endif

<h3>Komentar</h3>

@foreach($ticket->comments as $comment)
<p>
    <b>{{ $comment->user->name }}</b> :
    {{ $comment->message }}
</p>
@endforeach

@include('comments._form')

@endsection
