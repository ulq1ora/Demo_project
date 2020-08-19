<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Doggo paste</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{route('contact')}}">Добавление пасты</a>
        <a class="p-2 text-dark" href="{{route('contact-data')}}">Последние пасты</a>

        @if(Auth::check())
            <h6> Hello {{Auth::user()->name}} </h6>
            <form action="/logout" method="post" >@csrf<button class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" type="submit">Выйти</button>
        </form>
        @else
            <a class="p-2 text-dark" href="/register">Регистрация</a>
            <a class="p-2 text-dark" href="/login">Login</a>



        @endif
        {{--<a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" >Download</a>--}}
    </nav>
</div>
