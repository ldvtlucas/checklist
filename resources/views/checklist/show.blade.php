<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Visualizar checklist</h3><br>
    <a href="{{ url()->previous() }}">Voltar</a>
    <br>
    @csrf
    Nome:
    <label for="nome">{{ $checklist->nome_artefato }}</label>
    <br>
    Descrição:
    <label for="nome">{{ $checklist->descricao }}</label>
    <br>
    Perguntas:
    <table id="tbPerguntas" border="solid" width="70%">
        <thead>
            <th>Perguntas</th>
            <th>Respostas</th>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($checklist->perguntas); $i++)
                <tr>
                    <td>{{ $checklist->perguntas[$i] }}</td>
                    <td>{{ $checklist->respostas[$i] }}</td>
                </tr>
            @endfor
        </tbody>
    </table>



</body>
</html>