<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>menu</h3>
    <a href="{{ URL::route('projetos.index') }}">Projetos</a><br>
    <a href="{{ URL::route('processos.index') }}">Processos</a><br>
    <a href="{{ URL::route('nao-conformidades.index') }}">Não conformidades</a>
    @foreach ($processos as $processo)
    <br>
        <a href="">{{ $processo->nome }}</a>
    @endforeach
</body>
</html>