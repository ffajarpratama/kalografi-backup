<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style></style>
    <title>post paket</title>
</head>

<body>
    <form action="{{ route('requestorder') }}" method="post">
        @csrf

        <input type="number" name="order_id">
        <button type="submit">search</button>

    </form>
</body>

</html>
