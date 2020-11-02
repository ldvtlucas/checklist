<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ URL::route('processos.create') }}">Registrar novo processo</a>

    <table border="solid" width="100%">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
                @foreach ($processos as $processo)
                <tr>
                    <td>{{ $processo->id }}</td>
                    <td>{{ $processo->nome }}</td>
                    <td>{{ $processo->descricao }}</td>
                    <td>
                        <a href="{{ route('processos.edit', $processo->id) }}">Editar</a>
                        <form action="{{ route('processos.destroy', $processo->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
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