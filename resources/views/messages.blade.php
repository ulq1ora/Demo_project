@extends('layouts.app')
@section('title-block')Все сообщения@endsection
@section('content')
    <h1>Все сообщения</h1>
     <table class="table table-bordered table-hover table-responsive-sm">
         <thead>
         <tr class="table-primary">
             <th>Paste name</th>
             <th>Type</th>
             <th>Created</th>
             <th>####</th>
         </tr>
         @foreach($data as $el)
         <tr class="table table-bordered table-hover table-responsive-sm">
             <td>{{ $el->name }}</td>
             <td>{{ $el->type }}</td>
             {{--<td nowrap width="200" >{{ $el->message }}</td>--}}
             <td nowrap>{{ $el->created_at }}</td>
             <td><a href="#"><button class="btn btn-success">Детальнее</button></a></td>
         </tr>
         @endforeach
         </thead>
     </table>

@endsection


