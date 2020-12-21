<div class="form-wraper">
    <form action="{{URL::to(route('avaliacao.avaliar.s3', $cl_id))}}" method="post">
        @csrf
        @php
            $i = 1;
            foreach ($checklist->perguntas as $pergunta) {
                echo '
                    <div class="itemCard d-flex flex-column border p-3 mb-3 bg-light">
                        <div class="d-flex flex-row align-items-start">
                            <nobr class=""><b class="lblNumero">'.$i.' - </b> </nobr>
                            <span class="ml-1">'.$pergunta->pergunta.'</span> 
                            
                        </div>
                        <div class="d-flex flex-row justify-content-between mt-2">
                            <div>
                                <input type="radio" name="resposta_'.$i.'" id="resposta'.$i.'" value="conforme">
                                <span>Conforme</span>
                                <input class="ml-1" type="radio" name="resposta_'.$i.'" id="resposta'.$i.'" value="nao-conforme">
                                <span>Não Conforme</span>
                                <input class="ml-1" type="radio" name="resposta_'.$i.'" id="resposta'.$i.'" value="nao-aplicavel">
                                <span>Não Aplicável</span>
                            </div>
                            <div>
                                <b>Peso:</b>
                                <span class="ml-1" name="peso_'.$i.'">'.$pergunta->peso.'</span>
                            </div>
                        </div>
                    </div>';
                $i++;
            }
        @endphp
        <div class="d-flex flex-row justify-content-between">
            <a class="btn btn-secondary" href="{{ URL::to(route('avaliacao.avaliar.s1', $cl_id))}}"><i class="fas fa-arrow-left"></i> Voltar</a>
            <button class="btn btn-success" type="submit">Avançar <i class="fas fa-arrow-right"></i></button>
        </div>
    </form>
</div>
