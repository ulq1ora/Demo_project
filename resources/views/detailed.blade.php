@extends('layouts.app')
@section('title-block')Детальный просмотр.@endsection
@section('content')
    <div class="alert alert-info">
    <h1>{{$contact->name}}</h1>
        <h3>{{ $contact->message }}</h3>
    <p>{{ $contact->type }}</p>
    <td small>{{ $contact->created_at }}</td>
    </div>
@endsection
