<html>

<body align='center'>
    <h1>

    </h1>
    <form action="/store" method="POST">
        {{ csrf_field() }}
        <input type="text" name="login" /><br><br>
        <input type="text" name="password" /><br><br>
        <button type="submit">Valider</button>
    </form>
</body>

</html>