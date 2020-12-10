$(document).ready(function() {
    // identifica o numero de perguntas na pg
    var contador_pergunta = $('.itemCard:last').find('textarea').attr('name');
    contador_pergunta = contador_pergunta.replace('pergunta_', '');
    manageBtnRemove();
    

    // adicionar perguntas novas
    $('#btnAdd').click(function() {
        contador_pergunta++;
        var newCard = `
                <div class="itemCard d-flex flex-column border p-3 mt-3 bg-light">
                    <div class="d-flex flex-row align-items-start">
                        <nobr class="mt-2"><b  class="lblNumero">`+contador_pergunta+` - </b> </nobr>
                        <textarea class="form-control textarea-to-input mx-2" name="pergunta_`+contador_pergunta+`" rows="1"></textarea>
                        <button class="btn  btnRemove" type="button"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="d-flex flex-row align-items-center mt-2">
                        <b class="ml-auto">Peso:</b>
                        <input type="text" class="form-control ml-2 inPeso" value="1" name="peso_`+contador_pergunta+`">
                    </div>
                </div>`
        $('.itemCard').last().after(newCard);
        manageBtnRemove();
        return false;
    });

    // remover perguntas
    $(document.body).on("click", ".btnRemove", function() {
        var nextElement = $(this).parent().parent().next();
        $(this).parent().parent().remove();
        contador_pergunta--;
        if (nextElement.hasClass('itemCard')) {
            renumera(nextElement);
        } 
        manageBtnRemove();
    });

    function renumera(nextElement) {
        var flag = true;
        while (flag) {
            if (nextElement.hasClass('itemCard')) {
                reduceId(nextElement);
                nextElement = $(nextElement).next();
            } else {
                flag = false;
            }
        }
    }

    // reduz o Id por 1
    function reduceId(itemCard) {
        var newId = itemCard.find('textarea').attr('name');
        newId = newId.replace('pergunta_', '') -1 ;
        
        $(itemCard).find('textarea').attr('name', 'pergunta_'+newId);
        $(itemCard).find('input').attr('name', 'peso_'+newId);
        $(itemCard).find('.lblNumero').html(newId+' - ');

        
    }

    // alterar tamanho do textarea dinamicamente
    $('form').on('keydown', '.textarea-to-input', function(e){
        if(e.which == 13) {e.preventDefault();}
    }).on('input', '.textarea-to-input', function(){
        $(this).height(1);
        var totalHeight = $(this).prop('scrollHeight') - parseInt($(this).css('padding-top')) - parseInt($(this).css('padding-bottom'));
        $(this).height(totalHeight);
    });
    
    
    // desabilita o btnRemove quando só há uma pergunta
    function manageBtnRemove() {
        if ($('.itemCard').length == 1)
            $('.btnRemove').prop( "disabled", true );
        else
            $('.btnRemove').prop( "disabled", false );
    }
        
});