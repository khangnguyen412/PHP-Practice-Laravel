<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    @stack('css')
    <link rel="stylesheet" href="">
</head>

<body>
    @include('partials.header')

    <main>
        @if (@isset($param))
            Gọi view qua route thành công có tham số là {{ $param }}
        @else
            Gọi view qua route thành công
        @endif <br>

        {{-- Kiểm tra user đã đăng nhập --}}
        @auth
            Đã đã đăng nhập thành công!
        @endauth

        {{-- Kiểm tra user chưa đăng nhập --}}
        @guest
            Chưa đăng nhập!
        @endguest

        {{-- Kiểm tra section có tồn tại ko --}}
        @hasSection('content')
            @yield('content')
        @else
            Không có sections
        @endif

        {{-- Kiểm tra section có tồn tại ko --}}
        @sectionMissing('content-2')
            Không có sections thứ 2
        @endif
    </main>

    @include('partials.footer')
</body>

@stack('script')
</html>
