$(document).ready(function() {

            // alterar tamanho do textarea dinamicamente quando a pagina carrega
            $('textarea').each(function () {
                $(this).height(1);
                var totalHeight = $(this).prop('scrollHeight') - parseInt($(this).css('padding-top')) - parseInt($(this).css('padding-bottom'));
                $(this).height(totalHeight);
            });
            // alterar tamanho do textarea dinamicamente quando há input
            $('form').on('keydown', '.textarea-to-input', function(e){
                if(e.which == 13) {e.preventDefault();}
            }).on('input', '.textarea-to-input', function(){
                $(this).height(1);
                var totalHeight = $(this).prop('scrollHeight') - parseInt($(this).css('padding-top')) - parseInt($(this).css('padding-bottom'));
                $(this).height(totalHeight);
            });

        });