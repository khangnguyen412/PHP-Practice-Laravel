@extends('lecture08.parent-template') 
{{-- 
    @extends() - có tác dụng như là kế thừa lại template được gọi
    phải trỏ từ đường dẫn views 
--}}

{{-- cách 1: khai báo nội dung trực tiếp trong @section --}}
@section('title','test view template')

{{-- cách 2: khai báo nội dung trong phạm vi @section ... @endsectioin --}}
@section('content')
    <p> Đây là phần content của trang test view template kế thừa </p>
@endsection

@section('content1')
    @parent {{-- thêm @parent nếu trong @section() ở trang cha có nội dung --}}
    <p> Đây là phần content 1 của trang test view template kế thừa </p>
@endsection