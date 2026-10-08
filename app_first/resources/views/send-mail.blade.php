<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
</head>
<body>
    <div>
        @if ($email_sent)
            <p>Email has been sent</p>
        @endif
        <form action="{{route('send-mail.submit')}}" method="post">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"><br>
            <label for="message">Message:</label>
            <input type="text" name="message" id="message"><br>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
