@extends('layouts.app')
@section('title-block')Детальный просмотр.@endsection
@section('content')
    <div class="container">
    <h1 nowrap>{{$contact->name}}</h1>
            <pre class="prettyprint lang-{{strtolower($contact->lang)}}">{{ $contact->message }}</pre>
    <p>{{ $contact->type }}</p>
    <td small>{{ $contact->created_at }}</td>
    </div>
@endsection
