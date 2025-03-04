<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> @yield('title')</title>
        {{-- 
            @yield() @section() @show - là biến nhầm báo cho template vị trí nào sẽ chèn nội dung
        --}}
        <link rel="stylesheet" href="">
    </head>

    <body>
        <div class="container">
            {{-- ví dụ 1 --}}
            @section('content')
            @show

            {{-- ví dụ 2 --}}
            @section('content1')
                <p>đây là dòng nội dung của parent template </p>
            @show
        </div>
    </body>
</html>