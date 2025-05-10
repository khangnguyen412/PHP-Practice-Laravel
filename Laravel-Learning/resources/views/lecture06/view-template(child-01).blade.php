{{-- Kế thừa layout cha, luôn luôn gọi vào view này --}}
@extends('lecture06.view-template')

{{-- @stack và @push dùng để đẩy chèn nội dung vào layout (push sử dụng cho template con còn stack cho template cha) --}}
@push('css')
    {{-- đây là css đc lấy từ template con --}}
    <link href="{{ asset('build/assets/styles.css') }}" rel="stylesheet">
@endpush

@push('script')
    {{-- đây là js đc lấy từ template con --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('build/assets/app.js') }}"></script>
    <script src="{{ asset('build/assets/sidebar.js') }}"></script>
    <script src="{{ asset('build/assets/main.js') }}"></script>
@endpush

@section('title', 'Trang Chủ')

@section('content')
    <h1>Đây là template kế thừa 01</h1>

    @php $i = null @endphp
    @switch($i)
        @case(1)
            Biến i = 1
        @break

        @case(2)
            Biến i = 2
        @break

        @default
            Biến i ko phải số
    @endswitch <br>

    @php $i = [1, 2, 3, 4] @endphp
    @foreach ($i as $item)
        số trong vòng lặp hiện tại là {{ $item }} <br>
    @endforeach

    {{-- Nhúng 1 view khác vào blade --}}
    @php $i = 'Truyền tham số thành công' @endphp
    @include('lecture06.view-template(child-02)', ['data' => $i]) <br>
@endsection


