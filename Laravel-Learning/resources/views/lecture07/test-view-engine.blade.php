<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test view engine</title>
</head>
<body>
    {{--    
        + sử dụng biến {{ }} trong template blade: 
        {{ "" }} có tác dụng in xuất dữ liệu có dạng thô
    --}}
    <p> truyền biến vào template engine: {{"$param"}} </p>
    <p> in dữ liệu dưới dạng thô {{ '<h1> tên Khang In Đậm </h1>' }}</p>


    {{-- 
        + sử dụng {!! "" !!}   
        dạng này cho xuất dữ liệt có dạng appen HTML
    --}}
    {!! "<p> xuất dữ liệu dùng dưới dạng {!}</p>" !!}

</body>
</html>