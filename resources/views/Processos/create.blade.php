<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ URL::route('processos.index') }}" method="POST">
        @csrf
        Nome:
        <input type="text" name="nome">
        <br>
        Descrição:
        <textarea name="descricao" id="" cols="30" rows="10"></textarea>
        <br>
        
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>