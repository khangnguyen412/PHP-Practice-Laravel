<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('asset.css')
</head>

<body>
    @include('partials.header')

    <pre>Kết Quả: {{ json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }} </pre>
    @if ($_SERVER['REQUEST_URI'] == '/add-data-model-12' && $data == 'user exist')
        <script>
            setTimeout(function() {
                window.location.href = "/delete-data-model-12"
            }, 5000); // sau 5 giây tự động redirect về
        </script>
    @elseif ($_SERVER['REQUEST_URI'] == '/update-data-model-12' && $data == "user doesn't exist")
        <script>
            setTimeout(function() {
                window.location.href = "/add-data-model-12"
            }, 5000); // sau 5 giây tự động redirect về
        </script>
    @elseif ($_SERVER['REQUEST_URI'] == '/delete-data-model-12' && $data == "user doesn't exist")
        <script>
            setTimeout(function() {
                window.location.href = "/add-data-model-12"
            }, 5000); // sau 5 giây tự động redirect về
        </script>
    @endif

    @include('partials.footer')
</body>

@include('asset.script')
</html>
