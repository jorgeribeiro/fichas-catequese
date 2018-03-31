-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 04:14 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Creation: Mar 31, 2018 at 12:04 AM
-- Last update: Mar 31, 2018 at 01:00 AM
-- Last check: Mar 31, 2018 at 01:07 AM
--

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE IF NOT EXISTS `ficha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `data_nascimento` date NOT NULL,
  `naturalidade` varchar(32) NOT NULL,
  `endereco` varchar(128) NOT NULL,
  `bairro` varchar(32) NOT NULL,
  `cep` int(8) NOT NULL,
  `telefone` int(16) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ficha`
--

INSERT INTO `ficha` (`id`, `nome`, `data_nascimento`, `naturalidade`, `endereco`, `bairro`, `cep`, `telefone`, `estudante`, `colegio`, `batismo`, `eucaristia`, `data_batismo`, `paroquia_batismo`, `nome_pai`, `nome_mae`, `telefone_celular_pai`, `telefone_celular_mae`, `telefone_residencial`, `pais_casados_igreja`, `igreja_casamento`, `pais_vivem_juntos`, `frequentam_comunidade`, `ativos_paroquia`, `tipo_participacao`, `outra_paroquia`, `turma_atual`, `turno`, `ano_inicio_turma`, `catequista_1`, `catequista_2`, `catequista_3`, `catequizando_frequente`, `preenchimento_ficha`) VALUES
(2, 'Jorge', '1993-04-19', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0),
(4, 'Marco', '0000-00-00', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0),
(5, 'Lucas', '0000-00-00', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0),
(6, 'Nathalia', '0000-00-00', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0),
(7, 'NatÃ¡lia', '0000-00-00', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0),
(8, 'Sammyra', '0000-00-00', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0),
(9, 'Matheus', '0000-00-00', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0),
(12, 'AntÃ´nio', '0000-00-00', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0),
(11, 'Dilene', '0000-00-00', '', '', '', 0, 0, 0, '', 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, '', 0, 0, 0, '', '', '', '', 0, '', '', '', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
