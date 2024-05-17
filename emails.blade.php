<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Email</title>
    <link rel="shortcut icon" type="image/png" href="images\logoo.png">
</head>
<body>
    @include('home.headerhome')

    <form method="POST" action="{{ route('emails') }}">
        @csrf
        <p>
            <label for="name">Nom:</label><br>
            <input type="text" id="name" name="name" required>
        </p>
        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </p>
        <p>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea>
        </p>
        <button type="submit">Envoyer</button>
    </form>

    @include('home.fotter')
</body>
</html>
