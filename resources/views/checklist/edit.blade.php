<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Editar checklist</h3><br>
    <form action="{{ URL::route('checklist.update', [$pj_id, $pcs_id, $checklist->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        Nome:
        <input type="text" name="nome" value="{{ $checklist->nome_artefato }}">
        <br>
        Descrição:
        <textarea name="descricao" id="" cols="30" rows="10">{{ $checklist->descricao }}</textarea>
        <br>
        Perguntas:
        <table id="tbPerguntas" border="solid" width="70%">
            <thead>
                <th>Pergunta</th>
            </thead>
            <tbody>
                @foreach ($checklist->perguntas as $pergunta)
                    <tr>
                        <td>
                            <input type="text" name="pergunta_" value="{{ $pergunta }}">
                        </td>
                        <td><button type="button" class="btnRemove">X</button></td>
                    </tr>
                @endforeach
                <tr>
                    <td align="center"><button type="button" id="btnAdd">+ Adicionar pergunta</button></td>
                </tr>
            </tbody>
        </table>
        <button type="submit">Salvar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var contador_pergunta = 0;

            $('input[name^="pergunta_"]').each(function() {
                $(this).attr('name', 'pergunta_'+contador_pergunta);
                contador_pergunta++;
            });
            
            $('#btnAdd').click(function() {
                if ($('#tbPerguntas').find('tr:last').prev().find('input:first').val()){
                    contador_pergunta++;
                    $('#tbPerguntas').find('tr:last').prev().after('<tr><td><input type="text" name="pergunta_'+contador_pergunta+'" id=""></td><td><button type="button" class="btnRemove">X</button></td></tr>');
                }
                return false;
            });

            $(document.body).on("click", ".btnRemove", function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
</body>
</html>