-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Jul-2021 às 19:06
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja_virtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `clienteid` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID USUARIO',
  `nome` varchar(50) NOT NULL COMMENT 'NOME CLIENTE',
  `email` varchar(30) NOT NULL COMMENT 'EMAIL CLIENTE',
  `telefone` varchar(11) NOT NULL COMMENT 'TELEFONE CLIENTE',
  `cpf` varchar(20) NOT NULL COMMENT 'CPF',
  `senha` varchar(50) DEFAULT NULL COMMENT 'SENHA CADASTRO',
  `tipo_usuario` int(1) NOT NULL COMMENT 'TIPO USUARIO (1 - CLIENTE) (2 - ADM)''',
  `num_cartaocredito` varchar(16) DEFAULT NULL COMMENT 'NUMERO CARTÃO CLIENTE',
  `cvv_cartaocredito` int(3) DEFAULT NULL COMMENT 'Codigo Verificador Cartão',
  `titular_cartaocredito` varchar(30) DEFAULT NULL COMMENT 'Nome Titular Cartao',
  `vencimento_cartaocredito` date DEFAULT NULL COMMENT 'Data de vencimento cartão',
  PRIMARY KEY (`clienteid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`clienteid`, `nome`, `email`, `telefone`, `cpf`, `senha`, `tipo_usuario`, `num_cartaocredito`, `cvv_cartaocredito`, `titular_cartaocredito`, `vencimento_cartaocredito`) VALUES
(1, 'Joao da Silv', 'joao@jao.com', '54998755487', '05786547854', NULL, 1, '1234123412341234', 123, 'JOAO SILVA', '2024-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `enderecoid` int(4) NOT NULL AUTO_INCREMENT,
  `rua` varchar(100) NOT NULL,
  `numero` int(6) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`enderecoid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `idproduto` int(20) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL,
  PRIMARY KEY (`idproduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `fornecedorid` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`fornecedorid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`fornecedorid`, `nome`, `cnpj`, `descricao`, `telefone`, `email`) VALUES
(1, 'Fornecedor de Doritos', '1256476816', 'q', '54856584654', 'email@emsail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_pedido`
--

DROP TABLE IF EXISTS `item_pedido`;
CREATE TABLE IF NOT EXISTS `item_pedido` (
  `produtoid` int(4) NOT NULL COMMENT 'ID PRODUTO TABELA DE PRODUTOS',
  `pedidoid` int(4) NOT NULL COMMENT 'ID_PEDIDO TABELA DE PEDIDOS',
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL,
  KEY `ITEMPEDIDO_PRODUTO_FK` (`produtoid`),
  KEY `ITEMPEDIDO_PEDIDO_FK` (`pedidoid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `pedidoid` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID PEDIDO',
  `usuarioid` int(4) NOT NULL COMMENT ' ''ID CLIENTE TABELA DE CLIENTES',
  `data_emissao` date NOT NULL COMMENT 'DATA EMISSAO PEDIDO',
  `data_entrega` date NOT NULL COMMENT 'DATA ENTREGA PEDIDO',
  `situacao` varchar(20) NOT NULL COMMENT 'SITUACAO PEDIDO (1PENDENTE, 2ENVIADO, 3CANCELADO)',
  PRIMARY KEY (`pedidoid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `produtoid` int(4) NOT NULL AUTO_INCREMENT COMMENT '''ID PRODUTO',
  `fornecedorid` int(4) NOT NULL COMMENT 'ID DO FORNECEDOR TABELA DE FORNECEDORES',
  `nome` varchar(100) NOT NULL COMMENT 'NOME PRODUTO',
  `descricao` varchar(400) NOT NULL COMMENT 'DESCRICAO DO PRODUTO',
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`produtoid`),
  KEY `PRODUTO_FORNECEDOR_FK` (`fornecedorid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produtoid`, `fornecedorid`, `nome`, `descricao`, `foto`) VALUES
(1, 1, 'Doritos Picante', 'qwe', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioid` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`usuarioid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioid`, `login`, `senha`, `nome`) VALUES
(1, 'adm', 'adm', 'adm'),
(12, 'adm', 'b09c600fddc573f117449b3723f23d64', 'Ana Maria Braba');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
