<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="">
</head>
<body>
    @if (@isset($param))
        gọi view qua route thành công có tham số là {{$param}} <br>
    @else
        gọi view qua route thành công <br>
    @endif 
</body>
</html>