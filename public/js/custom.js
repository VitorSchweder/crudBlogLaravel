$(document).ready(function(){
    $(document).on('submit', 'td.acoes form', function(e) {
        e.preventDefault();

        if (confirm('Excluir o registro?')) {
            this.submit();
        }
    });

    $(document).on('click','div#container-grid-categoria a.adicionar', function(){
        $('div#container-grid-categoria div.container-grid').last().clone().appendTo('div#container-grid-categoria');
        //$('div#container-grid-categoria div.container-grid').last().find('input').val('');
    });

    $(document).on('click','div#container-grid-categoria a.remover', function(){
        if($('div#container-grid-categoria div.container-grid').length > 1) {
            $('div#container-grid-categoria div.container-grid').last().remove();
        }
    });
});
