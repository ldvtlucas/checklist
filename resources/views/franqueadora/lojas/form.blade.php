<div class="form-group mt-2">
    <div class="d-flex justify-content-center">
        <div class="w-50">
            <label for="nome">Nome:</label>
            <br>
            <input type="text" name="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" value="{{isset($loja->nome) ? $loja->nome : old('nome')}}">
        </div>
        <div class="ml-2 w-50">
            <label for="r_social">Razão social:</label>
            <br>
            <input type="text" name="r_social" class="form-control {{ $errors->has('r_social') ? 'is-invalid' : ''}}" value="{{isset($loja->r_social) ? $loja->r_social : old('r_social')}}">
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <div class="w-25">
            <label for="cnpj">CNPJ:</label>
            <br>
            <input type="text" name="cnpj" class="form-control {{ $errors->has('cnpj') ? 'is-invalid' : ''}} cnpj" value="{{isset($loja->cnpj) ? $loja->cnpj : old('cnpj')}}">
        </div>
        <div class="ml-2 w-25">
            <label for="cep">CEP:</label>
            <br>
            <input type="text" name="cep" id="cep" class="form-control {{ $errors->has('cep') ? 'is-invalid' : ''}} cep" value="{{isset($loja->cep) ? $loja->cep : old('cep')}}">
        </div>
        <div class="ml-2 w-25">
            <label for="cidade">Cidade:</label>
            <br>
            <input type="text" name="cidade" id="cidade" class="form-control {{ $errors->has('cidade') ? 'is-invalid' : ''}}" value="{{isset($loja->cidade) ? $loja->cidade : old('cidade')}}">
        </div>
        <div class="ml-2 w-25">
            <label for="estado">Estado:</label>
            <br>
            <input type="text" name="estado" id="uf" class="form-control {{ $errors->has('estado') ? 'is-invalid' : ''}}" value="{{isset($loja->estado) ? $loja->estado : old('estado')}}">
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <div class="w-25">
            <label for="bairro">Bairro:</label>
            <br>
            <input type="text" name="bairro" id="bairro" class="form-control {{ $errors->has('bairro') ? 'is-invalid' : ''}}" value="{{isset($loja->bairro) ? $loja->bairro : old('bairro')}}">
        </div>
        <div class="ml-2 w-50">
            <label for="rua">Rua:</label>
            <br>
            <input type="text" name="rua" id="rua" class="form-control {{ $errors->has('rua') ? 'is-invalid' : ''}}" value="{{isset($loja->rua) ? $loja->rua : old('rua')}}">
        </div>
        <div class="ml-2 w-25">
            <label for="numero">Número:</label>
            <br>
            <input type="text" name="numero" class="form-control {{ $errors->has('numero') ? 'is-invalid' : ''}}" value="{{isset($loja->numero) ? $loja->numero : old('numero')}}">
        </div>
        
    </div>
    <div class="d-flex justify-content-center mt-2">
        <div class="w-75">
            <label for="complemento">Complemento:</label>
            <br>
            <input type="text" name="complemento" class="form-control {{ $errors->has('complemento') ? 'is-invalid' : ''}}" value="{{isset($loja->complemento) ? $loja->complemento : old('complemento')}}">
        </div>
        <div class="ml-2 w-25">
            <label for="telefone">Telefone de contato:</label>
            <br>
            <input type="text" name="telefone" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : ''}} telefone" value="{{isset($loja->telefone) ? $loja->telefone : old('telefone')}}">
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <div class="w-50">
            <label for="email">E-mail de contato:</label>
            <br>
            <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" value="{{isset($loja->email) ? $loja->email : old('email')}}">
        </div>
        <div class="ml-2 w-50">
            <label for="responsavel">Nome do responsável:</label>
            <br>
            <input type="text" name="responsavel" class="form-control {{ $errors->has('responsavel') ? 'is-invalid' : ''}}" value="{{isset($loja->responsavel) ? $loja->responsavel : old('responsavel')}}">
        </div>
        <div class="ml-2">
            <label for="data_contrato">Data do contrato:</label>
            <br>
            <input type="date" name="data_contrato" class="form-control {{ $errors->has('data_contrato') ? 'is-invalid' : ''}}" value="{{isset($loja->data_contrato) ? substr($loja->data_contrato, 0, 10) : old('data_contrato')}}">
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-success w-50">Salvar</button>
    </div>
</div>