<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include('layout.navbar')
    @yield('content')

    <h1>ini analitik?</h1>
    <button id="balik">balik ke dasboard</button>

    <script>
document.getElementById('balik').addEventListener('click', function () {
    window.location.href = "{{ url('/') }}";
});
    </script>
</body>
</html>