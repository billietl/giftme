<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GiftMe</title>
        <link href="/css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('layouts.navbar')
        <div class=container>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
