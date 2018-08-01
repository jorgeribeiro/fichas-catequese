-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 03:22 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `ficha`
--

CREATE TABLE `ficha` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `comunidade` varchar(32) NOT NULL,
  `data_nascimento` date NOT NULL,
  `naturalidade` varchar(32) NOT NULL,
  `endereco` varchar(128) NOT NULL,
  `bairro` varchar(32) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `telefone` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `estudante` tinyint(1) NOT NULL,
  `colegio` varchar(32) NOT NULL,
  `batismo` tinyint(1) NOT NULL,
  `eucaristia` tinyint(1) NOT NULL,
  `data_batismo` date NOT NULL,
  `paroquia_batismo` varchar(128) NOT NULL,
  `nome_pai` varchar(128) NOT NULL,
  `nome_mae` varchar(128) NOT NULL,
  `telefone_celular_pai` varchar(32) NOT NULL,
  `telefone_celular_mae` varchar(32) NOT NULL,
  `telefone_residencial` varchar(32) NOT NULL,
  `pais_casados_igreja` tinyint(1) NOT NULL,
  `igreja_casamento` varchar(128) NOT NULL,
  `pais_vivem_juntos` tinyint(1) NOT NULL,
  `frequentam_comunidade` tinyint(1) NOT NULL,
  `ativos_paroquia` tinyint(1) NOT NULL,
  `tipo_participacao` varchar(128) NOT NULL,
  `outra_paroquia` varchar(128) NOT NULL,
  `turma_atual` varchar(32) NOT NULL,
  `dia_da_semana` varchar(32) NOT NULL,
  `turno` varchar(32) NOT NULL,
  `ano_inicio_turma` varchar(11) NOT NULL,
  `catequista_1` varchar(128) NOT NULL,
  `catequista_2` varchar(128) NOT NULL,
  `catequista_3` varchar(128) NOT NULL,
  `catequizando_frequente` tinyint(1) NOT NULL,
  `preenchimento_ficha` int(11) NOT NULL,
  `modificacao_ficha` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ficha`
--

INSERT INTO `ficha` (`id`, `nome`, `comunidade`, `data_nascimento`, `naturalidade`, `endereco`, `bairro`, `cep`, `telefone`, `email`, `estudante`, `colegio`, `batismo`, `eucaristia`, `data_batismo`, `paroquia_batismo`, `nome_pai`, `nome_mae`, `telefone_celular_pai`, `telefone_celular_mae`, `telefone_residencial`, `pais_casados_igreja`, `igreja_casamento`, `pais_vivem_juntos`, `frequentam_comunidade`, `ativos_paroquia`, `tipo_participacao`, `outra_paroquia`, `turma_atual`, `dia_da_semana`, `turno`, `ano_inicio_turma`, `catequista_1`, `catequista_2`, `catequista_3`, `catequizando_frequente`, `preenchimento_ficha`, `modificacao_ficha`) VALUES
(21, 'Jorge Luis Melo Ribeiro', 'Bequimão', '1993-04-19', 'Brasileiro', 'Rua 38, Quadra 18, Casa 4C', 'Bequimão', '65062-340', '(98) 98234-1517', 'joorgegemelo@gmail.com', 0, 'UFMA', 1, 1, '2017-02-14', '', 'Jorge Luis Pereira Ribeiro', 'Francisca Maria Melo Ribeiro', '', '', '(98) 3246-4873', 1, 'Paróquia de São José Operário', 1, 1, 1, 'PPI', '', 'Crisma', 'Domingo', 'Manhã', '2017', 'Sammyra', 'Dilene', '', 1, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `sobrenome` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `telefone` varchar(64) NOT NULL,
  `endereco` text NOT NULL,
  `senha` varchar(512) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `criado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `endereco`, `senha`, `status`, `criado`) VALUES
(7, 'Jorge', 'Ribeiro', 'joorgemelo@gmail.com', '982341517', 'Endereço', '$2y$10$CyBiRjkwPdOzhRUIlqAUFuL3FxUu9.ww7GR6A7Cffe1DIJ4zIo8ZO', 1, '2018-04-05 21:14:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
