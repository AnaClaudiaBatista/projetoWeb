$(document).ready(function()
{
    getTodosProdutosQuantidades();

    $('#btnFinalizar').on('click', function()
    {
        var json = getProdutoQuantidade();
        
        $.post('json/saveProdutoQuantidade.php', {data : json}, function()
        {
            $('#formPedido').submit();
        });
    });
});

function getProdutoQuantidade()
{
    var produtos = $("[name='produtoid']");
    var quantidades = $("[name='produtoQuantidade']");
    var length = produtos.length;
    var itens = [];

    for(var i = 0; i < length; i++)
    {
        var produtoid = produtos[i].value;
        var quantidade = quantidades[i].value;

        itens.push({
            'produtoid' : produtoid,
            'quantidade' : quantidade
        });
    }

    return JSON.stringify(itens);
}

function getTodosProdutosQuantidades()
{
    var json = getProdutoQuantidade();

    $.post('json/checkQuantidadeProdutoTotal.php', {data : json}, function(data)
    {
        $('#valorTotalPedido').text('R$ ' + data.toString());
    });
}

function checkQuantidade(produtoid, node, index)
{
    $.post('json/checkQuantidadeProduto.php', {produtoid : produtoid, value : node.value}, function(data)
    {
        data = JSON.parse(data);

        if(!data.check)
        {
            alert('Quantidade máxima para esse produto é ' + data.quantidade);

            if(node.value > 1)
            {
                node.value -= 1;
            }
            else{
                node.value = 1;
            }
        }
        else{
            var produtoValorTotal = $("[name='produtoValorTotal']")[index];
            var valorTotal = node.value * data.preco;

            $(produtoValorTotal).text('R$ ' + valorTotal.toString());
        }

        getTodosProdutosQuantidades();
    });
}

function deleteDoCarrinho(produtoid)
{
    alert(produtoid);
}