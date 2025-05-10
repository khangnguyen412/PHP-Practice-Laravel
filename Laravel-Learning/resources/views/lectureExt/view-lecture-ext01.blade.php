@extends('lectureExt.view-lecture-ext')
@section('url-lecture')
    @php
        /*
         *  - Cú pháp:
         *      + url($path, $parameters, $secure)
         *  - Trong đó
         *      $path: đường dẫn
         *      $parameters: tham số đi kèm
         *      $secure: là tham số quyết định protocol của URL là http hay https
         * */
    @endphp
    <p>Lấy Url có querystring: {{ url('/test-url', ['page', 2]) }}</p>
    <p>Lấy Url hiện tại: {{ url()->current() }}</p>
    <p>Lấy full Url: {{ url()->full() }}</p>
    <p>Lấy Url từ route: {{ url()->route('get-data') }}</p>
@endsection
