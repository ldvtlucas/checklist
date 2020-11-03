<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ URL::route('complexidades.index') }}" method="post">
        @csrf
        <br>
        Nome:
        <input type="text" name="nome">
        <br>
        Prazo em dias:
        <input type="number" name="prazo">
        <br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>