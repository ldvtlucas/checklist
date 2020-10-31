<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ URL::route('nao-conformidades.index') }}" method='POST'>
        @csrf
        Causa
        <input type="text" name="causa"><br>
        Tratativa
        <input type="text" name="tratativa"><br>
        Complexidade
        <select name="complexidade" id="">
            <option value="-1">opcoes</option>
        </select><br>
        Projeto
        <select name="projeto" id="">
            <option value="-1">opcoes</option>
        </select><br>
        Checklist
        <select name="checklist" id="">
            <option value="-1">opcoes</option>
        </select><br>
        Responsavel
        <input type="text" name="responsavel"><br>
        Prazo
        <input type="text" value="" disabled><br>
        Data de inicio
        <input type="date" name="data" id="data_inicio">
    </form>
</body>
</html>