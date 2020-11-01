<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>menu</h3>
    <a href="{{ URL::route('projetos.index') }}">Projetos</a><br>
    <a href="{{ URL::route('processos.index') }}">Processos</a><br>
    <a href="{{ URL::route('nao-conformidades.index') }}">Não conformidades</a><br>
    <select name="projeto" id="projeto">
        <option value="">Selecione um projeto</option>
        @foreach ($projetos as $pj)
            <option value="{{ $pj->id }}">{{ $pj->id." - ".$pj->nome }}</option>
        @endforeach
    </select>
    {{-- importa jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- exibe processos apenas apos selecionar o projeto --}}
    <script>
        $(document).ready(function() {
            $('#divProcessos').hide();
            $('#projeto').change(function() {
                if ($(this).val()) {
                    $('#divProcessos').show();
                } else {
                    $('#divProcessos').hide();
                }
            });
        });
    </script>
    <div id="divProcessos">
        @foreach ($processos as $processo)
            <br>
            <a href="/{{ $processo->id }}/checklist">{{ $processo->nome }}</a>
        @endforeach
    </div>
   
    
</body>
</html>