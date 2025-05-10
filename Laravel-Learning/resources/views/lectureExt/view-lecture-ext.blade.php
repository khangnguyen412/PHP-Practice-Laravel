<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('asset.css')
</head>

<body>
    @include('partials.header')

    <main>
        @hasSection('url-lecture')
            <h1>
                <strong>Url Lecture</strong>
            </h1>
            @yield('url-lecture')
        @endif <br>

        @hasSection('session-lecture')
            <h1>
                <strong>Session Lecture</strong>
            </h1>
            @yield('session-lecture')
        @endif <br>
    </main>

    @include('partials.footer')
</body>

@include('asset.script')

</html>
