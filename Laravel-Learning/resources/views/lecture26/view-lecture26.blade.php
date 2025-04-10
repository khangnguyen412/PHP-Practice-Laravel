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
        {{ $param ? $param : '' }}
    </main>

    @include('partials.footer')
</body>

@include('asset.script')

</html>

@php
    use Barryvdh\Debugbar\Facades\Debugbar;
    if (class_exists('Debugbar')) {
        echo Debugbar::getJavascriptRenderer()->render();
    }
@endphp
