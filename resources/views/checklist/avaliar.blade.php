<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Avaliação</h3>
    <form action="{{ URL::route('checklist.avaliado', [$pj_id, $pcs_id, $checklist->id]) }}" method="POST">
        @csrf
        <table>
            <thead>
                <th>Perguntas</th>
                <th>Respostas</th>
            </thead>
            <tbody>
                @foreach ($checklist->perguntas as $pergunta)
                <tr>
                    <td>
                        <label for="pergunta">{{ $pergunta }}</label>
                    </td>
                    <td>
                        <input type="text" class="resposta" name="resposta" required autofocus>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <button type="submit">Enviar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var contador_resposta = 0;

            $('input[name^="resposta"]').each(function() {
                $(this).attr('name', 'resposta_'+contador_resposta);
                contador_resposta++;
            });

        });
    </script>
</body>
</html>