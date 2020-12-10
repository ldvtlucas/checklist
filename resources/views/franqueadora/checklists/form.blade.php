<div class="form-container">
    <div class="d-flex justify-content-start">
        <div class="w-100">
            <label for="nome">Nome:</label>
            <br>
            <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" value="{{ isset($checklist->nome) ? $checklist->nome : old('nome')  }}">
        </div>
    </div>
    <div class="d-flex justify-content-start mt-2">
        <div class="w-100">
            <label for="descricao">Descrição:</label>
            <br>
            <textarea class="form-control textarea-to-input" name="descricao" id="" cols="30" rows="1">{{ isset($checklist->descricao) ? $checklist->descricao : old('descricao') }}</textarea>
        </div>
    </div>
    <div class="d-flex justify-content-start mt-2">
        <div class="w-100">
            <label for="categoria">Categoria:</label>
            <br>
            <select name="categoria" class="form-control">
                <option value="" hidden>Selecione uma categoria</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ (old("categoria") == $cat->id ? "selected":"") }} {{ isset($checklist->categoria) && $checklist->categoria == $cat->id  ? "selected" : "" }}>{{ $cat->id.' - '.$cat->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-start mt-2">
        <div class="w-100">
            <label for="categoria">Perguntas:</label>
            <div class="pergutnas-wraper" id="pergutnas-wraper">
                
                @php
                    if (old()) {
                        $old = old();
                        $keys = array_keys($old);

                        foreach ($keys as $key) {
                            if (strpos($key, 'pergunta_') > -1) {
                                $id = str_replace('pergunta_', '', $key);
                                
                                echo '<div class="itemCard d-flex flex-column border p-3 mt-3 bg-light">
                                        <div class="d-flex flex-row align-items-start">
                                            <nobr class="mt-2"><b  class="lblNumero">'.$id.' - </b> </nobr>
                                            <textarea class="form-control textarea-to-input mx-2" name="pergunta_'.$id.'" rows="1">'.$old['pergunta_'.$id].'</textarea>
                                            <button class="btn  btnRemove" type="button"><i class="fas fa-times"></i></button>
                                        </div>
                                        <div class="d-flex flex-row align-items-end mt-2">
                                            <b class="ml-auto">Peso:</b>
                                            <input type="text" class="form-control ml-2 inPeso" value="'.$old['peso_'.$id].'" name="peso_'.$id.'">
                                        </div>
                                    </div>';
                                
                            }
                        }
                    } else if (isset($checklist)) {
                        $i = 1;
                        
                        foreach ($checklist->perguntas as $pergunta) {
                            echo '<div class="itemCard d-flex flex-column border p-3 mt-3 bg-light">
                                    <div class="d-flex flex-row align-items-start">
                                        <nobr class="mt-2"><b  class="lblNumero">'.$i.' - </b> </nobr>
                                        <textarea class="form-control textarea-to-input mx-2" name="pergunta_'.$i.'" rows="1">'.$pergunta->pergunta.'</textarea>
                                        <button class="btn  btnRemove" type="button"><i class="fas fa-times"></i></button>
                                    </div>
                                    <div class="d-flex flex-row align-items-end mt-2">
                                        <b class="ml-auto">Peso:</b>
                                        <input type="text" class="form-control ml-2 inPeso" value="'.$pergunta->peso.'" name="peso_'.$i.'">
                                    </div>
                                </div>';
                           $i++;
                        }
                    } else {
                        echo '
                        <div class="itemCard d-flex flex-column border p-3 bg-light">
                            <div class="d-flex flex-row align-items-start">
                                <nobr class="mt-2"><b class="lblNumero">1 - </b> </nobr>
                                <textarea class="form-control textarea-to-input mx-2" name="pergunta_1" rows="1"></textarea>
                                <button class="btn  btnRemove" type="button"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="d-flex flex-row align-items-end mt-2">
                                <b class="ml-auto">Peso:</b>
                                <input type="text" class="form-control ml-2 inPeso" value="1"  name="peso_1">
                            </div>
                        </div>';
                    }
                    
                @endphp        
            </div>
            <div class="btn-wraper d-flex justify-content-center mt-2">
                <button type="button" class="btn w-50 text-secondary" id="btnAdd"><i class="fas fa-plus"></i> Adicionar pergunta</button>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end">
    <button class="btn btn-success" type="submit">Salvar</button>
</div>