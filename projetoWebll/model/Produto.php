<?php
class Produto{
    
    private $produtoid;
    private $fornecedorid;
    private $nome;
    private $descricao;     
    private $foto;    
    private $produto_estoque;
    

    public function __construct($produtoid, $fornecedorid, $nome, $descricao, $foto )
    {
        $this->produtoid    =$produtoid;
        $this->fornecedorid =$fornecedorid;
        $this->nome         =$nome;
        $this->descricao    =$descricao;        
        $this->foto         =$foto;
        
    }

    
    public function getProdutoid() { return $this->produtoid; }
    public function setProdutoid($produtoid) {$this->produtoid = $produtoid;}

    public function getFornecedorid() { return $this->fornecedorid; }
    public function setFornecedorid($fornecedorid) {$this->fornecedorid = $fornecedorid;}
    
    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getDescricao() { return $this->descricao; }
    public function setDescricao($descricao) {$this->descricao = $descricao;}    

    public function getFoto() { return $this->foto; }
    public function setFoto($foto) {$this->foto = $foto;}
  
    public function getEstoque() { return $this->produto_estoque; }
    public function setEstoque($produto_estoque) {$this->produto_estoque = $produto_estoque;}

    public static function returnJson($produtos)
    {
        $produtos_json = [];

        foreach($produtos as $item)
        {
            $produtos_json[] = [
                'produtoid' => $item->getProdutoid(),
                'nome' => $item->getNome(),
                'descricao' => $item->getDescricao(),
                'foto' => null,
                'preco' => $item->getEstoque()->getPreco(),
                'quantidade' => $item->getEstoque()->getQuantidade()
            ];
        }

        return $produtos_json;
    }

    public static function existsInArray($entry, $array) {
        foreach ($array as $compare) {
            if ($compare->getProdutoid() == $entry->getProdutoid()) {
                return true;
            }

            return false;
        }
    }

    public static function getValorTotal($arrayProdutos, $arrayProdutosQuantidades)
    {
        $valorTotal = 0;

        foreach ($arrayProdutos as $itemProduto) {
            foreach ($arrayProdutosQuantidades as $itemProdutoQuantidade) {
                if($itemProduto->getProdutoid() ==  (int)$itemProdutoQuantidade->produtoid)
                {
                    $valorParcial = (double)$itemProduto->getEstoque()->getPreco() * (int)$itemProdutoQuantidade->quantidade;
                    $valorTotal += $valorParcial;
                    break;
                }
            }
        }
        
        return $valorTotal;
    }
}