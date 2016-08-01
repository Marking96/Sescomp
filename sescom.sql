-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Ago-2016 às 20:35
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id_atividade`, `titulo`, `vagas`, `mapeamento`, `descricao`, `palestrantes`, `vagas_disp`) VALUES
(1, 'programação web', 40, '[1]', 'teste 1', '[1,2]', 40),
(2, 'Programação java', 40, '[2]', 'teste 2', '[3]', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_palestrante`
--

CREATE TABLE `atividade_palestrante` (
  `id_palestrante` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividade_palestrante`
--

INSERT INTO `atividade_palestrante` (`id_palestrante`, `id_atividade`) VALUES
(1, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_participante`
--

CREATE TABLE `atividade_participante` (
  `id_participante` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividade_participante`
--

INSERT INTO `atividade_participante` (`id_participante`, `id_atividade`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapa`
--

CREATE TABLE `mapa` (
  `id_mapa` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `dia` date NOT NULL,
  `inicio` time NOT NULL,
  `termino` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mapa`
--

INSERT INTO `mapa` (`id_mapa`, `nome`, `dia`, `inicio`, `termino`) VALUES
(1, 'M01', '2016-08-22', '08:00:00', '10:00:00'),
(2, 'M02', '2016-08-23', '10:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapeamento_atividade`
--

CREATE TABLE `mapeamento_atividade` (
  `id_atividade` int(11) NOT NULL,
  `id_mapa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestrante`
--

CREATE TABLE `palestrante` (
  `id_palestrante` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `gplus` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `palestrante`
--

INSERT INTO `palestrante` (`id_palestrante`, `nome`, `descricao`, `facebook`, `twitter`, `gplus`) VALUES
(0, 'Ateulus', 'hoi aqui de novo', '', '', ''),
(1, 'marcos', 'Doutor em alguma ciusa', NULL, NULL, NULL),
(2, 'joão', 'tambem deve ser Doutor', NULL, NULL, NULL),
(3, 'maria', 'há tanto faz', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participante`
--

CREATE TABLE `participante` (
  `id_participante` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone1` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `data_nasc` date NOT NULL,
  `escolaridade` varchar(50) NOT NULL,
  `ocupacao` varchar(50) NOT NULL,
  `iniciativa` varchar(50) NOT NULL,
  `instensino` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participante`
--

INSERT INTO `participante` (`id_participante`, `nome`, `cpf`, `email`, `telefone1`, `cep`, `cidade`, `uf`, `data_nasc`, `escolaridade`, `ocupacao`, `iniciativa`, `instensino`, `sexo`, `status`, `data_cadastro`) VALUES
(1, 'Alberto dos santos', 123345123, 'asantos', 889999969, 62900000, 'Russa', 'CE', '2015-04-27', 'completo', 'comunidade', '', '', 'M', 0, '2016-08-01'),
(2, 'Antonia fontineri', 621234230, 'fontinerigata@gmail.com', 889999999, 62930000, 'Limoeiro do Norte', 'CE', '2015-05-26', 'Superior', 'estudande', 'publica', 'UFC', 'F', 0, '2016-08-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(41) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `data_acesso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `senha`, `nome`, `data_acesso`) VALUES
(2, 'marking96', '356a192b7913b04c54574d18c28d46e6395428ab', 'Marcelo Estevam', '2016-08-01'),
(3, 'teknus', '356a192b7913b04c54574d18c28d46e6395428ab', 'Mateus Oliveira', '2016-08-01'),
(4, 'admin', 'c138f15c2688fefc69777a808732abf1664b25dd', 'Administrador', '2016-08-01');

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
  ADD KEY `atividade_palestrante_ibfk_1` (`id_palestrante`),
  ADD KEY `atividade_palestrante_ibfk_2` (`id_atividade`);

--
-- Indexes for table `atividade_participante`
--
ALTER TABLE `atividade_participante`
  ADD KEY `atividade_participante_ibfk_1` (`id_atividade`),
  ADD KEY `atividade_participante_ibfk_2` (`id_participante`);

--
-- Indexes for table `mapa`
--
ALTER TABLE `mapa`
  ADD PRIMARY KEY (`id_mapa`);

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
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id_atividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mapa`
--
ALTER TABLE `mapa`
  MODIFY `id_mapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `participante`
--
ALTER TABLE `participante`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
