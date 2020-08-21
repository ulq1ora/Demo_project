<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- provide the csrf token -->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script>
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(".postbutton").click(function () {
            $.ajax({
                /* the route pointing to the post function */
                url: "{{route('search')}}",
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, search: $(".getinfo").val()},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */

                success: function (data) {
                    $('tbody').empty();
                    if (data.length == 0) {
                        $('tbody').append('<tr><td>' + 'Не найдено' + '</td></tr>')
                    }
                    data.forEach(
                        function (item) {

                            var name = '<td>' + item.name + '</td>'
                            var lang = '<td>' + item.lang + '</td>'
                            var href = '<td><a href="' + item.url + '">ТЫК</a></td>'
                            var html = '<tr>'+name+lang+href+'</tr>'
                            $('tbody').append(html)
                        });


                    /*                    users.forEach(function(item){
                                            $('tbody').append('<tr><td>'+item.firstName+'</td><td>'+item["last Name"]+'</td><td>'+item.age+'</td></tr>')
                                        });*/
                    console.log(data);
                    /*document.getElementById("search_result").innerHTML = "<b>Ololo</b>";*/
                }
            });
        });
    });
</script>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Doggo paste</h5>
    <div>


            <input type="text"  placeholder="search" value="паста" class="form-group getinfo">
            @csrf<button class="btn btn-primary postbutton">Поиск</button>
            <div id="search_result">Результат поиска</div>
        <table>
            <thead>
            <tr>
                <th>Pasta Name</th>
                <th>Pasta Lang</th>
                <th>TЫКай</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{route('contact')}}">Добавление пасты</a>
        <a class="p-2 text-dark" href="{{route('contact-data')}}">Последние пасты</a>

        @if(Auth::check())
            <h6> Hello {{Auth::user()->name}} </h6>
            <form action="/logout" method="post" >@csrf<button class="btn btn-primary" type="submit">Выйти</button>
        </form>
        @else
            <a class="p-2 text-dark" href="/register">Регистрация</a>
            <a class="p-2 text-dark" href="/login">Login</a>

        @endif
        {{--<a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" >Download</a>--}}
    </nav>
</div>
