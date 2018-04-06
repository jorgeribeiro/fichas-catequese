-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2018 at 06:43 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catequese_fichas`
--
CREATE DATABASE IF NOT EXISTS `catequese_fichas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `catequese_fichas`;

-- --------------------------------------------------------

--
-- Table structure for table `ficha`
--
-- Creation: Apr 06, 2018 at 09:29 PM
-- Last update: Apr 06, 2018 at 09:29 PM
--

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE IF NOT EXISTS `ficha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `comunidade` varchar(32) NOT NULL,
  `data_nascimento` date NOT NULL,
  `naturalidade` varchar(32) NOT NULL,
  `endereco` varchar(128) NOT NULL,
  `bairro` varchar(32) NOT NULL,
  `cep` int(8) NOT NULL,
  `telefone` int(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `estudante` tinyint(1) NOT NULL,
  `colegio` varchar(32) NOT NULL,
  `batismo` tinyint(1) NOT NULL,
  `eucaristia` tinyint(1) NOT NULL,
  `data_batismo` date NOT NULL,
  `paroquia_batismo` varchar(128) NOT NULL,
  `nome_pai` varchar(128) NOT NULL,
  `nome_mae` varchar(128) NOT NULL,
  `telefone_celular_pai` int(16) NOT NULL,
  `telefone_celular_mae` int(16) NOT NULL,
  `telefone_residencial` int(16) NOT NULL,
  `pais_casados_igreja` tinyint(1) NOT NULL,
  `igreja_casamento` varchar(128) NOT NULL,
  `pais_vivem_juntos` tinyint(1) NOT NULL,
  `frequentam_comunidade` tinyint(1) NOT NULL,
  `ativos_paroquia` tinyint(1) NOT NULL,
  `tipo_participacao` varchar(128) NOT NULL,
  `outra_paroquia` varchar(128) NOT NULL,
  `turma_atual` varchar(32) NOT NULL,
  `turno` varchar(32) NOT NULL,
  `ano_inicio_turma` int(11) NOT NULL,
  `catequista_1` varchar(128) NOT NULL,
  `catequista_2` varchar(128) NOT NULL,
  `catequista_3` varchar(128) NOT NULL,
  `catequizando_frequente` tinyint(1) NOT NULL,
  `preenchimento_ficha` int(11) NOT NULL,
  `modificacao_ficha` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ficha`
--

INSERT INTO `ficha` (`id`, `nome`, `comunidade`, `data_nascimento`, `naturalidade`, `endereco`, `bairro`, `cep`, `telefone`, `email`, `estudante`, `colegio`, `batismo`, `eucaristia`, `data_batismo`, `paroquia_batismo`, `nome_pai`, `nome_mae`, `telefone_celular_pai`, `telefone_celular_mae`, `telefone_residencial`, `pais_casados_igreja`, `igreja_casamento`, `pais_vivem_juntos`, `frequentam_comunidade`, `ativos_paroquia`, `tipo_participacao`, `outra_paroquia`, `turma_atual`, `turno`, `ano_inicio_turma`, `catequista_1`, `catequista_2`, `catequista_3`, `catequizando_frequente`, `preenchimento_ficha`, `modificacao_ficha`) VALUES
(2, 'Jorge', '', '1993-04-19', '', '', '', 0, 0, '', 0, '', 0, 0, '2018-04-13', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--
-- Creation: Apr 05, 2018 at 11:52 PM
-- Last update: Apr 06, 2018 at 12:15 AM
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `sobrenome` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `telefone` varchar(64) NOT NULL,
  `endereco` text NOT NULL,
  `senha` varchar(512) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `criado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `endereco`, `senha`, `status`, `criado`) VALUES
(7, 'Jorge', 'Ribeiro', 'joorgemelo@gmail.com', '982341517', 'Endereço', '$2y$10$CyBiRjkwPdOzhRUIlqAUFuL3FxUu9.ww7GR6A7Cffe1DIJ4zIo8ZO', 1, '2018-04-05 21:14:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
