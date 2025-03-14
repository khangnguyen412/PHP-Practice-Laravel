<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>test view engine</title>
    </head>
    
    <body>
        {{-- 
            + điều kiện if else
            cú pháp:
                @if (điều kiện)
                    câu lệnh nếu thỏa đk
                @elseif (điều kiện thứ 2)
                    câu lệnh nếu điều kiện đâu tiên sai
                @else
                    câu lệnh nếu tất cả điều kiện trên sai
                @endif
        --}}
        @php ( $i = 4 )
        @if ($i == 4)
            <p>i có giá trị là {{ $i }}</p>
        @elseif ( $i == 2 )
            <p>i có giá trị là {{ $i }}</p>
        @else
            <p> tất cả điều kiện của i đều sai</p>
        @endif
    </body>
</html>