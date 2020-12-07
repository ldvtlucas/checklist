<div class="form-group mt-2">
    <div class="">
        <div class="w-100">
            <label for="nome">Nome:</label>
            <br>
            <input type="text" name="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" value="{{isset($categoria->nome) ? $categoria->nome : old('nome')}}">
        </div>
        <div class="w-100">
            <label for="descricao">Descrição:</label>
            <br>
            <textarea name="descricao" class="textarea-to-input form-control {{ $errors->has('descricao') ? 'is-invalid' : ''}}" rows="1">{{isset($categoria->descricao) ? $categoria->descricao : old('descricao')}}</textarea>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-4">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>