<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ URL::route('projetos.create') }}">Iniciar Novo Projeto</a>

    <table>
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </thead>
        <tbody>
                @foreach ($projetos as $projeto)
                <tr>
                    <td>{{ $projeto->id }}</td>
                    <td>{{ $projeto->nome }}</td>
                    <td>{{ $projeto->descricao }}</td>
                    <td>{{ $projeto->status }}</td>
                    <td>
                        <a href="{{ route('projetos.edit', $projeto->id) }}">Editar</a>
                        <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir?')) return false;">
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