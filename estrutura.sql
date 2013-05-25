-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2012 at 10:34 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `melhordicav1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anunciante`
--

CREATE TABLE IF NOT EXISTS `tb_anunciante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `nome_anunciante` varchar(255) NOT NULL,
  `telefone1` varchar(255) NOT NULL,
  `telefone2` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `nome_estado` varchar(255) NOT NULL,
  `sigla_estado` varchar(255) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `nome_cidade` varchar(255) NOT NULL,
  `nome_regiao` varchar(255) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anuncios`
--

CREATE TABLE IF NOT EXISTS `tb_anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `id_anunciante` int(11) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `especificacao` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_assinaturas`
--

CREATE TABLE IF NOT EXISTS `tb_assinaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anunciante` int(11) NOT NULL,
  `codigo_plano` int(11) NOT NULL,
  `quantidade_anuncios` int(11) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `vigencia_de` date NOT NULL,
  `vigencia_ate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_categorias`
--

CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) NOT NULL,
  `nome_categoria` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `visibilidade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;


-- --------------------------------------------------------

--
-- Table structure for table `tb_departamentos`
--

CREATE TABLE IF NOT EXISTS `tb_departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_departamento` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `visibilidade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


-- --------------------------------------------------------

--
-- Table structure for table `tb_planos`
--

CREATE TABLE IF NOT EXISTS `tb_planos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `valor` double NOT NULL,
  `periodo_dias` int(11) NOT NULL,
  `quantidade_anuncios` int(11) NOT NULL,
  `promo` tinyint(1) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `caracteristicas` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sa_user`
--

CREATE TABLE IF NOT EXISTS `tb_sa_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_subcategoria`
--

CREATE TABLE IF NOT EXISTS `tb_subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_subcategoria` varchar(255) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `filter` tinyint(1) NOT NULL DEFAULT '0',
  `filter_type` int(11) NOT NULL COMMENT '"1" para marca "2" para outros',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `visibilidade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;
