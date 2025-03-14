<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    get route::get successfully
    @if (@isset($users))
        ddaa {{ $users }}
        @foreach ($users as $user)
            <p>This is fullname of user {{ $user->fullName }}</p>
            <p>This is age of user {{ $user->age }} </p>
        @endforeach
    @endif
</body>