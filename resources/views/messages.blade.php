@extends('layouts.app')
@section('title-block')Все сообщения@endsection
@section('content')
    <div  class="table table-bordered table-hover table-responsive-sm">
        <h1>Все сообщения</h1>
        <table class="table table-bordered table-hover table-responsive-sm">
            <thead>
            <tr class="table-primary">
                <th>Paste name</th>
                <th>Type</th>
                <th>TTL</th>
                <th>Created</th>
                <th>####</th>
            </tr>
            @foreach($data as $el)
                <tr class="table table-bordered table-hover table-responsive-sm">
                    @if($el->isExpired() == true)
                    @else
                        <td>{{ $el->name }}</td>
                        <td>{{ $el->type }}</td>
                        <td>{{ $el->ttl }}</td>
                        <td nowrap>{{ $el->created_at }}</td>
                        <td><a href="{{route('detailed',['hash' => $el->hash ])}}"><button class="btn btn-success">Детальнее</button></a></td>
                    @endif
                </tr>
            @endforeach
            </thead>
        </table>

@endsection


