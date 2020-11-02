<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Criar checklist</h3><br>
    <form action="{{ URL::route('checklist.store', [$pj_id, $pcs_id]) }}" method="post">
        @csrf
        Nome:
        <input type="text" name="nome">
        <br>
        Descrição:
        <textarea name="descricao" id="" cols="30" rows="10"></textarea>
        <br>
        Perguntas:
        <table id="tbPerguntas" border="solid" width="70%">
            <thead>
                <th>Pergunta</th>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="pergunta_1" id=""></td>
                </tr>
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
            var contador_pergunta = 1;
            $('#btnAdd').click(function() {
                if ($('#tbPerguntas').find('tr:last').prev().find('input:first').val()){
                    contador_pergunta++;
                    $('#tbPerguntas').find('tr:last').prev().after('<tr><td><input type="text" name="pergunta_'+contador_pergunta+'" id=""></td></tr>');
                }
                return false;
            });
        });
    </script>
</body>
</html>