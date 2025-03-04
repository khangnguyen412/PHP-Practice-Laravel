<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>test view engine</title>
    </head>
    
    <body>
        {{-- 
            + vòng lặp for
            cú pháp:
                @for (điều kiện)
                    câu lệnh nếu thỏa đk
                @endfor
        --}}
        <p>vòng lặp for:</p>
        @for($i = 0; $i < 10; $i++)
            <p> giá trị của i là {{ $i }} </p>
        @endfor <br>


        {{-- 
            + tạo mãng trong blade template
            cú pháp:
                @php ($biến = ["các phần tử mãng"])
        --}}
        @php ($arr = [1, 2, 3])
        
        {{-- 
            + vòng lặp foreach
            cú pháp:
                @foreach(điều kiện)
                    câu lệnh nếu thỏa đk
                @endforeach
        --}}
        <p>vòng lặp foreach:</p>
        @foreach($arr as $item)
            <p> đây là phần tử thứ {{ $item }} của mãng</p>
        @endforeach <br>


        {{-- 
            + vòng lặp forelse
            cú pháp:
                @forelse($biến as $phần_tử_của_mãng)
                    câu lệnh nếu mãng truyền vào có phần tử
                @empty
                    câu lênh nếu mãng truyền vào là mãng rỗng
                @endforelse
        --}}
        <p>vòng lặp forelse:</p>
        @php ($arr1 = [])
        @forelse($arr1 as $item)
            <p> đây là phần tử thứ {{ $item }} của mãng</p>
        @empty
            <p> mãng không có phần tử </p>
        @endforelse <br>

        
        {{-- 
            + vòng lặp while:
            cú pháp: 
                @while (điều kiện)
                    câu lệnh
                @endwhile
        --}}
        <p>vòng lặp while:</p>
        @php ($i = 0)
        @while ($i <= 10)
            <p>hiện tại $i là {{ $i }}</p>
            @php ( $i++ )
        @endwhile <br>
    </body>
</html>