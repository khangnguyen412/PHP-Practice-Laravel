<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> lecture09 </title>
    <link rel="stylesheet" href="">
</head>

<body>
    <div class="container">
        <p>đầy là hàm getName() trong ControllerLecture09</p>
    </div>
    <div class="container">
        @if ($name != null)
            <p> Có tham số Name là <?php echo $name; ?>
            @else
            <p> Không có tham số </p>
        @endif
    </div>
</body>

</html>
