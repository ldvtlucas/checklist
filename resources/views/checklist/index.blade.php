<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>checklist</h3>
    <a href="{{ URL::route('checklist.create', [$pj_id, $pcs_id]) }}">+ Adicionar novo checklist</a>
    <table width="100%" border="solid">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($checklist as $cl)
                <tr>
                    <td>{{ $cl->id }}</td>
                    <td>{{ $cl->nome_artefato }}</td>
                    <td>{{ $cl->descricao }}</td>
                    <td>
                        @if (isset($cl->respostas))
                            <a href="{{ URL::route('checklist.show', [$pj_id, $pcs_id, $cl->id]) }}">Visualizar avaliação |</a>
                        @endif
                        <a href="{{ URL::route('checklist.avaliar', [$pj_id, $pcs_id, $cl->id]) }}">Avaliar |</a>
                        <a href="{{ URL::route('checklist.edit', [$pj_id, $pcs_id, $cl->id]) }}">Editar |</a>
                        <form action="{{ URL::route('checklist.destroy', [$pj_id, $pcs_id, $cl->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td align="center" colspan="4"><a href="{{ URL::route('checklist.create', [$pj_id, $pcs_id]) }}">+ Adicionar novo checklist</a> </td>
            </tr>
        </tbody>
    </table>
</body>
</html>