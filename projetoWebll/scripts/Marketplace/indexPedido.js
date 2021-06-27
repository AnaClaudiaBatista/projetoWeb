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

function buscaPedido(numero) {
    $.ajax
    ({
        //Configurações
        type: 'GET',//Método que está sendo utilizado.
        url: 'pedido/' + id,//Indica a página que está sendo solicitada.
        //função que vai ser executada assim que a requisição for enviada
        success: function (msg)
        {

            var pedido = JSON.parse(msg);

            if(pedido!=null){
                $('#numeroPedido').val(pedido.numero);
                $('#dataPedido').val(pedido.dataPedido);
                $('#dataEntregue').val(pedido.dataEntregue);
                $('#situacao').val(pedido.situacao);
            } 
            
        }
    });
}

function buscaPedidos($) {
    $.ajax
    ({
        //Configurações
        type: 'GET',//Método que está sendo utilizado.
        url: 'pedido/',//Indica a página que está sendo solicitada.
        //função que vai ser executada assim que a requisição for enviada
        success: function (msg)
        {
            var mydata = eval(msg);
            var quantos = Object.keys(mydata).length;
            if(quantos>0) {
                var table = $.makeTablePedidos(mydata);
                $("#div_pedidos").html("<h1>Turmas</h1>");
                $("#div_pedidos").append(table);
            }            
        }
    });
}

function alteraPedido() {
    
    var pedido = {
        numero : $('#numero_do_pedido').val(),
        dataPedido : $('#data_Pedido').val(),
        dataEntregue : $('#data_Entregue').val(),
        situacao : $('#situacao').val()
    }

    $.ajax
    ({
        //Configurações
        type: 'PUT',//Método que está sendo utilizado.
        url: 'pedido/' + pedido.numero,//Indica a página que está sendo solicitada.
        dataType: "json",
        data : JSON.stringify(turma),

        //função que será executada quando a solicitação for finalizada.
        complete: function (msg)
        {
            $('#numero').val("");
            $('#dataPedido').val("");
            $('#dataEntregue').val("");
            $('#situacao').val("");
            buscaPedidos($);
        }
    });
   
}


function removePedido(numero) {
    $.ajax
    ({
        //Configurações
        type: 'DELETE',//Método que está sendo utilizado.
        dataType: 'json',//É o tipo de dado que a página vai retornar.
        url: 'pedido/' + id,//Indica a página que está sendo solicitada.
        //função que será executada quando a solicitação for finalizada.
        complete: function (msg)
        {
            buscaPedidos($);
        }
    });
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

$.makeTablePedidos = function (mydata) {
    var table = $('<table class="table table-striped table-advance table-hover">');
    var tblHeader = "<tbody><tr>";
    tblHeader += "<th>Numero</th>";
    tblHeader += "<th>DataPedido</th>";
    tblHeader += "<th>DataEntregue</th>";
    tblHeader += "<th>Situação</th>";
    tblHeader += "</tr>";
    $(tblHeader).appendTo(table);
    $.each(mydata, function (index, value) {
        var TableRow = "<tr class='clickable-row'>";
        var numero = -1;
        $.each(value, function (key, val) {
            TableRow += "<td>" + val + "</td>";
            if(key=="numero") {
                numero = val;
            }
        });

        // botão para remover uma turma
        TableRow += "<td>";
        TableRow += "<button class=\"btn btn-primary\" onClick=\"";
        TableRow += "buscaPedido(" + idTurma + ");\">Alterar</button>";
        TableRow += "<button class=\"btn btn-danger\" onClick=\"";
        TableRow += "if(confirm('Deseja mesmo excluir o pedido?')) removePedido(";
        TableRow += numero + ");\">Excluir</button>";
        TableRow += "</td>";

        TableRow += "</tr>";
        $(table).append(TableRow);
    });
    return ($(table));
};