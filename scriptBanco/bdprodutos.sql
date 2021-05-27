-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 14/02/2014 às 12:07
-- Versão do servidor: 5.5.32
-- Versão do PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `bdprodutos`
--
CREATE DATABASE IF NOT EXISTS `bdprodutos` DEFAULT CHARACTER SET latin7 COLLATE latin7_general_ci;
USE `bdprodutos`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcategoria`
--

CREATE TABLE IF NOT EXISTS `tbcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nmCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Fazendo dump de dados para tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`idCategoria`, `nmCategoria`) VALUES
(1, 'Alimentos'),
(3, 'TI'),
(4, 'Cosméticos'),
(5, 'Eletrônicos'),
(6, 'Laticínios'),
(7, 'Perfumaria'),
(8, 'Brinquedos'),
(9, 'Limpeza'),
(10, 'Móveis'),
(11, 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprodutos`
--

CREATE TABLE IF NOT EXISTS `tbprodutos` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `nmProduto` varchar(50) NOT NULL,
  `descProduto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Fazendo dump de dados para tabela `tbprodutos`
--

INSERT INTO `tbprodutos` (`idProduto`, `idCategoria`, `nmProduto`, `descProduto`) VALUES
(32, 3, 'PC', 'PC'),
(35, 8, 'Notebook', 'dasfadsf'),
(38, 11, 'Refrigerante', 'Coca cola'),
(41, 3, 'Smartphone', 'Sansung'),
(42, 11, 'Produto alterado', 'teste'),
(43, 11, 'Garrafa', 'Gatorade'),
(44, 11, 'Novo produto', 'Ceverja'),
(45, 1, 'Arroz', 'Tio JoÃ£o');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `email`, `password`, `user`, `nome`, `tipo`) VALUES
(1, 'admin@gmail.com', '123', 'admin', 'Márcio Assis', 'A'),
(2, 'cefet@cefet.com.br', '123', 'cefet', 'CEFET-MG', 'N');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD CONSTRAINT `tbprodutos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
