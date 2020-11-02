<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ URL::route('complexidades.create') }}">Adicionar nível de complexidade</a>
    <table border="solid" width='100%'>
        <thead>
            <th width='5%'>#</th>
            <th>Nome</th>
            <th>Prazo</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($complexidades as $cplx)
                <tr>
                    <td>{{ $cplx->id }}</td>
                    <td>{{ $cplx->nome }}</td>
                    <td>{{ $cplx->prazo." dias" }}</td>
                    <td>
                        <a href="{{ route('complexidades.edit', $cplx->id) }}">Editar</a>
                        <form action="{{ route('complexidades.destroy', $cplx->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>