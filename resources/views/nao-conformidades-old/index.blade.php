<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ URL::route('nao-conformidades.create') }}">registrar nao conformidade</a>
    <div style="text-align: right;">
        <a href="{{ URL::route('complexidades.index') }}">Gerenciar graus de complexidade</a>
    </div>
    <table border="solid" width='100%'>
        <thead>
            <th width='5%'>#</th>
            <th>Causa</th>
            <th>Tratativa</th>
            <th>Complexidade</th>
            <th>Projeto</th>
            <th>Checklist</th>
            <th>Escalonada?</th>
            <th>Responsável</th>
            <th>Prazo Resolução</th>
            <th>Data Inicial</th>
            <th>Data Final</th>
            <th>Status</th>
        </thead>
        <tbody>

        </tbody>
    </table>
</body>
</html>