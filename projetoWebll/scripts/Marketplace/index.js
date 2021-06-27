$(document).ready(function()
{
    $.get('json/listCarrinho.php', function(json)
    {
        var data = JSON.parse(json);

        fillCarrinho(data);
    });
});

function addCarinho(btn)
{
    var id = btn.name;

    $.post('json/addCarrinho.php', {produtoid : id}, function(json)
    {
        var data = JSON.parse(json);

        if(data.check == true)
        {
            fillCarrinho(data.data);
        }
        else{
            alert('Item já adicionado no carrinho!');
        }

        
    });
}

function fillCarrinho(data)
{
    $('#lista_carrinho').html('');
    addHeaderCarrinho();

    if(data != null && data.length > 0)
    {
        $(data).each(function(e, item)
        {
            addBodyCarrinho(item);
        });
    
        addFooterCarrinho();
    
        $('#count_carrinho').text(data.length.toString() + '+');
    }
    
}

function addBodyCarrinho(item)
{
    $('#lista_carrinho').append('<div class="dropdown-item d-flex align-items-center"> \
        <div class="mr-3"> \
            <div class="icon-circle bg-primary"> \
                <i class="fas fa-file-alt text-white"></i> \
            </div> \
        </div> \
        <div> \
            <div class="small text-gray-500">' + item.nome + '</div> \
            <span class="font-weight-bold">' + item.descricao + '</span> \
        </div> \
    </div>');
}

function addHeaderCarrinho()
{
    $('#lista_carrinho').append('<h6 class="dropdown-header">Carrinho</h6>');
}

function addFooterCarrinho()
{
    $('#lista_carrinho').append('<a class="dropdown-item text-center small text-green" href="indexPedido.php">Realizar Pedido</a>');
}