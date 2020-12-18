<div class="form-wraper">
    <form class="form-group" action="{{URL::to(route('avaliacao.avaliar.s2', $cl_id))}}" method="post">
        @csrf
        <label for="loja"></label>
        <select class="form-control {{$errors->has('loja') ? "is-invalid" : ""}}" id="loja" name="loja">
            <option value="" hidden>Selecione uma loja</option>
            @foreach ($lojas as $lj)
                <option value="{{ $lj->id }}" data-loja="{{$lj}}" {{ ($loja == $lj->id) ? 'selected' : '' }}>{{ $lj->id.' - '. $lj->nome }}</option>
            @endforeach
        </select>
        <div class="loja-data-wraper mt-4">
            <div class="d-flex flex-row">
                <div class="flex-column col-6">
                    <label for="">Razão social:</label>
                    <span id="r_social"></span>
                </div>
                <div class="flex-column col-6">
                    <label for="">Responsável:</label>
                    <span id="responsavel"></span>
                </div>
            </div>
            <div class="d-flex flex-row mt-2">
                <div class="flex-column col-6">
                    <label for="">Endereço:</label>
                    <span id="endereco"></span>
                </div>
                <div class="flex-column col-6">
                    <label for="">Cidade:</label>
                    <span id="cidade"></span>
                </div>

            </div>
        </div>
        <div class="d-flex flex-row justify-content-between mt-3">
            <a class="btn btn-secondary" href="{{ URL::to(route('avaliacao.index'))}}" onclick="return confirm('Ao voltar todo o progresso sera perdido, deseja continuar?')"><i class="fas fa-arrow-left"></i> Voltar</a>
            <button class="btn btn-success" type="submit">Avançar <i class="fas fa-arrow-right"></i></button>
        </div>
    </form>
</div>


<script>
    $(document).ready(function () {
        setLojaData();

        $('#loja').on('change', function () {
            setLojaData();
        });

        function setLojaData() {
            var loja = $("#loja option:selected").data('loja');
            if (loja !== undefined) {
                $('#r_social').html(loja['r_social']);
                $('#responsavel').html(loja['responsavel']);
                $('#endereco').html(loja['rua']+', '+loja['numero']);
                $('#cidade').html(loja['cidade']+' - '+loja['estado']);
            }
            
        }
    });
</script>

