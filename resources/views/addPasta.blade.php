@extends('layouts.app')
@section('title-block')
    Пастовая
@endsection
@section('content')
    <h1>Добавление новой пасты</h1>
    <form action="{{ route('contact-form') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Введите имя</label>
            <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Выберите тип пасты</label>
            {{--<input type="text" name="email" placeholder="Введите мыло" id="email" class="form-control">--}}
            <select name="type" class="form-control">
                <option >public - </option> {{--//Тут можно внутри тега указать value=x и оно будет передаваться в базу.--}}
                @if(Auth::check())
                <option>private</option>
                <option>unlisted</option>
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="ttl">Укажите длительность пасты</label>
            {{--<input type="text" name="subject" placeholder="Введитe тему сообщения" id="subject" class="form-control">--}}
            <select name="ttl" class="form-control">
                <option>10m</option>
                <option>01h</option>
                <option>03h</option>
                <option>01d</option>
                <option>01w</option>
                <option>01m</option>
                <option>inf</option>
            </select>
        </div>

        <div class="form-group">
            <label for="message">Cообщение</label>
            <textarea name="message" id="message" class="form-control" placeholder="Введитe пасту"></textarea>
        </div>

        <button type="submit" CLASS="btn btn-success">Отправить</button>
    </form>
@endsection

