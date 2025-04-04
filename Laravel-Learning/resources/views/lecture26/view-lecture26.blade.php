<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{ $param ? $param : '' }}
</body>

</html>

@php
    use Barryvdh\Debugbar\Facades\Debugbar;
    if (class_exists('Debugbar')) {
        echo Debugbar::getJavascriptRenderer()->render();
    }
@endphp
