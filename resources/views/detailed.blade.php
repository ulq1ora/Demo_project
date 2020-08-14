@extends('layouts.app')
@section('title-block')
    Детальный просмотр.
@endsection
@section('content')
    <h1>Просмотр пасты</h1>
    <td>{{ $contact->type }}</td>
    <td>{{ $contact->type }}</td>
    <td>{{ $contact->ttl }}</td>
@endsection
