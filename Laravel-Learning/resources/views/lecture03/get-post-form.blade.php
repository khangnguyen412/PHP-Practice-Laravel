<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- tại đây form sẽ gọi tới method post có url /testPostRoute --}}
    <form action="/test-route-post" method="post" >
        @csrf
        <label for="name"> Nhập Tên Vào Đây </label>
        <input type="text" name="name" id="name">
        <button type="submit">Gửi</button>
    </form>
</body>
</html>