
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 09/03/2017 às 19:32:54
-- Versão do Servidor: 10.1.21-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u573658764_papel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Ajuste`
--

CREATE TABLE IF NOT EXISTS `Ajuste` (
  `cd_ajuste` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dt_ajuste` date NOT NULL,
  `ds_justificativa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Pessoa_cd_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`cd_ajuste`,`Pessoa_cd_pessoa`),
  UNIQUE KEY `cd_ajuste` (`cd_ajuste`),
  KEY `fk_Ajuste_Pessoa1_idx` (`Pessoa_cd_pessoa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Ajuste_has_Produto`
--

CREATE TABLE IF NOT EXISTS `Ajuste_has_Produto` (
  `Ajuste_cd_ajuste` int(11) NOT NULL,
  `Produto_cd_produto` int(11) NOT NULL,
  `qt_produto` int(11) NOT NULL,
  PRIMARY KEY (`Ajuste_cd_ajuste`,`Produto_cd_produto`),
  KEY `fk_Ajuste_has_Produto_Produto1_idx` (`Produto_cd_produto`),
  KEY `fk_Ajuste_has_Produto_Ajuste1_idx` (`Ajuste_cd_ajuste`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Compra`
--

CREATE TABLE IF NOT EXISTS `Compra` (
  `cd_compra` int(10) unsigned NOT NULL,
  `dt_compra` date NOT NULL,
  `ds_pagamento_compra` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fornecedor_cd_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`cd_compra`,`Fornecedor_cd_fornecedor`),
  UNIQUE KEY `cd_compra` (`cd_compra`),
  KEY `fk_Compra_Fornecedor1_idx` (`Fornecedor_cd_fornecedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Compra_has_Produto`
--

CREATE TABLE IF NOT EXISTS `Compra_has_Produto` (
  `Compra_cd_compra` int(11) NOT NULL,
  `Compra_Fornecedor_cd_fornecedor` int(11) NOT NULL,
  `Produto_cd_produto` int(11) NOT NULL,
  `qt_produto` int(11) NOT NULL,
  `nm_produto` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Compra_cd_compra`,`Compra_Fornecedor_cd_fornecedor`,`Produto_cd_produto`),
  KEY `fk_Compra_has_Produto_Produto1_idx` (`Produto_cd_produto`),
  KEY `fk_Compra_has_Produto_Compra1_idx` (`Compra_cd_compra`,`Compra_Fornecedor_cd_fornecedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Fornecedor`
--

CREATE TABLE IF NOT EXISTS `Fornecedor` (
  `cd_fornecedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cd_cnpj_fornecedor` int(10) unsigned NOT NULL,
  `nm_fornecedor` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ds_endereco_fornecedor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cd_tel_fornecedor` int(11) DEFAULT NULL,
  `ds_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cd_fornecedor`),
  UNIQUE KEY `cd_fornecedor` (`cd_fornecedor`),
  UNIQUE KEY `cd_cnpj_fornecedor` (`cd_cnpj_fornecedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pessoa`
--

CREATE TABLE IF NOT EXISTS `Pessoa` (
  `cd_pessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_nome` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cd_telefone` int(11) DEFAULT NULL,
  `ds_endereco` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vl_salario` double DEFAULT NULL,
  `cd_login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cd_senha` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cd_rg` int(11) NOT NULL,
  `cd_adm` tinyint(1) NOT NULL,
  `cd_cpf` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cd_pessoa`),
  UNIQUE KEY `cd_login_UNIQUE` (`cd_login`),
  UNIQUE KEY `cd_pessoa` (`cd_pessoa`),
  UNIQUE KEY `cd_cpf` (`cd_cpf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Produto`
--

CREATE TABLE IF NOT EXISTS `Produto` (
  `cd_produto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cd_codbarra` int(11) NOT NULL,
  `nm_produto` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ds_produto` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qt_produto` int(11) NOT NULL,
  `vl_produto` float NOT NULL,
  `ds_categoria` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cd_produto`),
  UNIQUE KEY `cd_produto` (`cd_produto`),
  UNIQUE KEY `cd_produto_2` (`cd_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Produto_has_Venda`
--

CREATE TABLE IF NOT EXISTS `Produto_has_Venda` (
  `Produto_cd_produto` int(11) NOT NULL,
  `Venda_cd_venda` int(11) NOT NULL,
  `nm_produto` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `vl_produto` float NOT NULL,
  `qt_produto` int(11) NOT NULL,
  PRIMARY KEY (`Produto_cd_produto`,`Venda_cd_venda`),
  KEY `fk_Produto_has_Venda_Venda1_idx` (`Venda_cd_venda`),
  KEY `fk_Produto_has_Venda_Produto1_idx` (`Produto_cd_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Venda`
--

CREATE TABLE IF NOT EXISTS `Venda` (
  `cd_venda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dt_venda` date DEFAULT NULL,
  `ds_pagamento` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pessoa_cd_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`cd_venda`),
  UNIQUE KEY `cd_venda` (`cd_venda`),
  KEY `fk_Venda_Pessoa1_idx` (`Pessoa_cd_pessoa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
