
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 02/08/2016 às 18:55:11
-- Versão do Servidor: 10.0.20-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u592794861_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL,
  `vagas` varchar(100) DEFAULT NULL,
  `situacao` varchar(100) NOT NULL,
  `local` varchar(100) NOT NULL,
  `mapeamento` varchar(11) DEFAULT NULL,
  `descricao` varchar(500) NOT NULL,
  `palestrantes` varchar(50) NOT NULL,
  `vagas_disp` int(11) NOT NULL,
  PRIMARY KEY (`id_atividade`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id_atividade`, `titulo`, `tipo`, `vagas`, `situacao`, `local`, `mapeamento`, `descricao`, `palestrantes`, `vagas_disp`) VALUES
(1, 'programação web', '', '40', '', '', '[1]', 'teste 1', '[1,2]', 40),
(2, 'Programação java', '', '40', '', '', '[2]', 'teste 2', '[3]', 13),
(3, 'Abertura', 'oficina', '99', 'ativo', 'Laboratório I', '["1"]', 'Abertura do Evento', '["0"]', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_palestrante`
--

CREATE TABLE IF NOT EXISTS `atividade_palestrante` (
  `id_palestrante` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  KEY `atividade_palestrante_ibfk_1` (`id_palestrante`),
  KEY `atividade_palestrante_ibfk_2` (`id_atividade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `atividade_participante` (
  `id_participante` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  KEY `atividade_participante_ibfk_1` (`id_atividade`),
  KEY `atividade_participante_ibfk_2` (`id_participante`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `mapa` (
  `id_mapa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) NOT NULL,
  `dia` date NOT NULL,
  `inicio` time NOT NULL,
  `termino` time NOT NULL,
  PRIMARY KEY (`id_mapa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `mapeamento_atividade` (
  `id_atividade` int(11) NOT NULL,
  `id_mapa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestrante`
--

CREATE TABLE IF NOT EXISTS `palestrante` (
  `id_palestrante` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `gplus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_palestrante`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `participante` (
  `id_participante` int(11) NOT NULL AUTO_INCREMENT,
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
  `data_cadastro` date NOT NULL,
  PRIMARY KEY (`id_participante`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;
-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `senha` varchar(41) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `data_acesso` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `senha`, `nome`, `data_acesso`) VALUES
(2, 'marking96', '356a192b7913b04c54574d18c28d46e6395428ab', 'Marcelo Estevam', '2016-08-02'),
(3, 'teknus', '356a192b7913b04c54574d18c28d46e6395428ab', 'Mateus Oliveira', '2016-08-02'),
(4, 'admin', 'c138f15c2688fefc69777a808732abf1664b25dd', 'Administrador', '2016-08-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
