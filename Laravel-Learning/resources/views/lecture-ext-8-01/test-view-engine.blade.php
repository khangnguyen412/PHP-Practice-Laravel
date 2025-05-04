<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('asset.css')
    <title>test view engine</title>
</head>

<body>
    @include('partials.header')

    <main>
        {{-- Kiểm tra user đã đăng nhập --}}
        @auth
            Đã đã đăng nhập thành công!
        @endauth

        {{-- Kiểm tra user chưa đăng nhập --}}
        @guest
            Chưa đăng nhập!
        @endguest
    </main>

    @include('partials.footer')
</body>
@include('asset.script')

</html>
