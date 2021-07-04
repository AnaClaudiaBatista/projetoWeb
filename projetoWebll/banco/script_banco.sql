-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Jul-2021 às 00:03
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
  `num_cartaocredito` varchar(16) DEFAULT NULL COMMENT 'NUMERO CARTÃO CLIENTE',
  `usuarioid` int(11) NOT NULL,
  PRIMARY KEY (`clienteid`),
  KEY `cliente_fk` (`usuarioid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`clienteid`, `nome`, `email`, `telefone`, `cpf`, `num_cartaocredito`, `usuarioid`) VALUES
(1, 'Joao da Silv', 'joao@jao.com', '54998755487', '05786547854', '1234123412341234', 1),
(2, 'teste', 'teste@yteste.com', '5898', '6829282', '13258', 2);

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
  `produtoid` int(20) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL,
  PRIMARY KEY (`produtoid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`produtoid`, `quantidade`, `preco`) VALUES
(1, 5, 10);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`fornecedorid`, `nome`, `cnpj`, `descricao`, `telefone`, `email`) VALUES
(1, 'Fornecedor de Doritos', '1256476816', 'q', '54856584654', 'email@emsail.com'),
(2, 'Fornecedor de Salgadinhos LDTA', '84.554.874/0001-54', 'Vende Latinhas', '54996442762', 'salgadinhos@teste.com'),
(3, 'Queijos de Minas', '548.557.487/0001-01', 'Vende Latinhas', '54996442762', 'anac.batiista@gmail.com');

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
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `perfilid` int(4) NOT NULL,
  `descricao` varchar(50) NOT NULL
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produtoid`, `fornecedorid`, `nome`, `descricao`, `foto`) VALUES
(1, 1, 'Doritos Picante', 'qwe', NULL),
(2, 2, 'Cebolitos', 'sabor', NULL),
(5, 2, 'Salgadinhos', 'sas', NULL);

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
  `perfilid` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuarioid`),
  KEY `usuario_perfil_fk` (`perfilid`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioid`, `login`, `senha`, `nome`, `perfilid`) VALUES
(1, 'adm', 'adm', 'adm', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
