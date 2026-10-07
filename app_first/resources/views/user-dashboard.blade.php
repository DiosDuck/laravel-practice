<html lang="en">
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h3>User Dashboard</h3>

    @if(auth()->check())
        <p>Name: {{ auth()->user()->name }}</p>
        <p>Email: {{ auth()->user()->email }}</p>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">LOGOUT</button>
        </form>
    @else
        <p>Log in please</p>
    @endif
</body>
</html>
