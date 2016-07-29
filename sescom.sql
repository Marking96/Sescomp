-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jul-2016 às 19:23
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sescomp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id_atividade` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `mapeamento` varchar(11) DEFAULT NULL,
  `descricao` varchar(500) NOT NULL,
  `palestrantes` varchar(50) NOT NULL,
  `vagas_disp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id_atividade`, `titulo`, `vagas`, `mapeamento`, `descricao`, `palestrantes`, `vagas_disp`) VALUES
(1, 'programação web', 40, '[1]', 'teste 1', '[1,2]', 40),
(2, 'Programação java', 40, '[2]', 'teste 2', '[3]', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_palestrante`
--

CREATE TABLE `atividade_palestrante` (
  `id_palestrante` int(11) DEFAULT NULL,
  `id_atividade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

--
-- Extraindo dados da tabela `atividade_palestrante`
--

INSERT INTO `atividade_palestrante` (`id_palestrante`, `id_atividade`) VALUES
(1, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_participante`
--

CREATE TABLE `atividade_participante` (
  `vagas_ocupadas` int(11) DEFAULT NULL,
  `id_atividade` int(11) DEFAULT NULL,
  `id_participante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapa`
--

CREATE TABLE `mapa` (
  `id_mapa` int(11) NOT NULL,
  `dia` date DEFAULT NULL,
  `inicio` time DEFAULT NULL,
  `termino` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

--
-- Extraindo dados da tabela `mapa`
--

INSERT INTO `mapa` (`id_mapa`, `dia`, `inicio`, `termino`) VALUES
(1, '2016-07-13', '08:00:00', '10:00:00'),
(2, '2016-07-14', '10:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapeamento_atividade`
--

CREATE TABLE `mapeamento_atividade` (
  `id_mapa` int(11) DEFAULT NULL,
  `id_atividade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestrante`
--

CREATE TABLE `palestrante` (
  `id_palestrante` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

--
-- Extraindo dados da tabela `palestrante`
--

INSERT INTO `palestrante` (`id_palestrante`, `nome`) VALUES
(1, 'marcos'),
(2, 'joão'),
(3, 'maria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participante`
--

CREATE TABLE `participante` (
  `id_participante` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone1` int(11) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `escolaridade` varchar(50) DEFAULT NULL,
  `ocupacao` varchar(50) DEFAULT NULL,
  `iniciativa` varchar(50) NOT NULL,
  `instensino` varchar(50) DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id_atividade`);

--
-- Indexes for table `atividade_palestrante`
--
ALTER TABLE `atividade_palestrante`
  ADD KEY `id_palestrante` (`id_palestrante`),
  ADD KEY `id_atividade` (`id_atividade`);

--
-- Indexes for table `atividade_participante`
--
ALTER TABLE `atividade_participante`
  ADD KEY `id_atividade` (`id_atividade`),
  ADD KEY `id_participante` (`id_participante`);

--
-- Indexes for table `mapa`
--
ALTER TABLE `mapa`
  ADD PRIMARY KEY (`id_mapa`);

--
-- Indexes for table `mapeamento_atividade`
--
ALTER TABLE `mapeamento_atividade`
  ADD KEY `id_mapa` (`id_mapa`);

--
-- Indexes for table `palestrante`
--
ALTER TABLE `palestrante`
  ADD PRIMARY KEY (`id_palestrante`);

--
-- Indexes for table `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id_participante`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividade_palestrante`
--
ALTER TABLE `atividade_palestrante`
  ADD CONSTRAINT `atividade_palestrante_ibfk_1` FOREIGN KEY (`id_palestrante`) REFERENCES `palestrante` (`id_palestrante`),
  ADD CONSTRAINT `atividade_palestrante_ibfk_2` FOREIGN KEY (`id_atividade`) REFERENCES `atividades` (`id_atividade`);

--
-- Limitadores para a tabela `atividade_participante`
--
ALTER TABLE `atividade_participante`
  ADD CONSTRAINT `atividade_participante_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `atividades` (`id_atividade`),
  ADD CONSTRAINT `atividade_participante_ibfk_2` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`);

--
-- Limitadores para a tabela `mapeamento_atividade`
--
ALTER TABLE `mapeamento_atividade`
  ADD CONSTRAINT `mapeamento_atividade_ibfk_1` FOREIGN KEY (`id_mapa`) REFERENCES `mapa` (`id_mapa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
