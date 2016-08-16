-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Ago-2016 às 12:55
-- Versão do servidor: 5.5.49-0+deb8u1
-- PHP Version: 5.6.22-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sescomp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
`id_atividade` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `local` varchar(100) NOT NULL,
  `situacao` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `mapeamento` varchar(11) DEFAULT NULL,
  `descricao` varchar(500) NOT NULL,
  `palestrantes` varchar(50) NOT NULL,
  `vagas_disp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id_atividade`, `titulo`, `vagas`, `local`, `situacao`, `tipo`, `mapeamento`, `descricao`, `palestrantes`, `vagas_disp`) VALUES
(10, 'Minicurso', 30, 'LaboratÃ³rio II', 'ativo', 'oficina', '["7"]', 'Inskape: Software livre para manipular imagens vetoriais.', '["19"]', 25),
(11, 'Minicurso', 30, 'LaboratÃ³rio I', 'ativo', 'oficina', '["7"]', 'Controle de versÃ£o com Git.', '["21"]', 27),
(12, 'Minicurso', 30, 'LaboratÃ³rio III', 'ativo', 'oficina', '["7"]', 'Minerando dados com Weka ', '["22"]', 23),
(13, 'Maratona de ProgramaÃ§Ã£o', 33, 'Sala de Estudos', 'ativo', 'oficina', '["7"]', ' Aquecimento', '["29"]', 0),
(15, ' Workshop de IHC', 100, 'AuditÃ³rio', 'ativo', 'oficina', '["9"]', 'Engenharia semiÃ³tica: a comunicaÃ§Ã£o via interface entre projetistas e usuÃ¡rios', '["13"]', 91),
(16, ' Workshop de IHC', 100, 'AuditÃ³rio', 'ativo', 'oficina', '["10"]', 'Metodologia de trabalho e\r\nresultados com foco em IHC', '["8"]', 93),
(17, 'II FÃ³rum de Mulheres na Tecnologia', 50, 'LaboratÃ³rio I', 'ativo', 'oficina', '["9"]', ' ', '["16"]', 48),
(18, 'II FÃ³rum de Mulheres na Tecnologia', 50, 'VideoconferÃªncia', 'ativo', 'oficina', '["10"]', ' A Engenharia de Software\r\nVai Salvar o Mundo', '["30"]', 48),
(19, 'Minicurso', 30, 'LaboratÃ³rio III', 'ativo', 'oficina', '["38"]', 'IntroduÃ§Ã£o ao Linux', '["19"]', 23),
(20, 'Palestra', 50, 'VideoconferÃªncia', 'ativo', 'oficina', '["12"]', 'Trabalho Remoto - Mito ou Realidade?', '["10"]', 40),
(22, 'Maratona de ProgramaÃ§Ã£o', 33, 'Sala de Estudos', 'ativo', 'oficina', '["13"]', 'A CompetiÃ§Ã£o', '["29"]', 0),
(23, 'Minicurso', 30, 'Sala 8', 'ativo', 'oficina', '["13"]', 'IntroduÃ§Ã£o Ã \r\nUnity Engine', '["20"]', 26),
(24, 'Minicurso', 30, 'LaboratÃ³rio I', 'ativo', 'oficina', '["14"]', 'Web Scraping', '["25"]', 28),
(25, 'Minicurso', 30, 'LaboratÃ³rio II', 'ativo', 'oficina', '["13"]', 'Latex', '["0"]', 15),
(27, 'Palestra', 50, 'VideoconferÃªncia', 'ativo', 'oficina', '["15"]', 'Internet das Coisas', '["5"]', 46),
(30, 'Minicurso', 30, 'LaboratÃ³rio I', 'ativo', 'oficina', '["41"]', 'ProgramaÃ§Ã£o para\r\nGoogle App Engine', '["23"]', 15),
(31, 'Minicurso', 30, 'LaboratÃ³rio II', 'ativo', 'oficina', '["18"]', 'PadrÃµes de projeto', '["31"]', 25),
(32, 'Workshop de LÃ³gica', 100, 'AuditÃ³rio', 'ativo', 'oficina', '["19"]', 'LÃ³gica Modal', '["2"]', 95),
(33, 'Workshop de LÃ³gica', 100, 'AuditÃ³rio', 'ativo', 'oficina', '["20"]', 'Engenharia de Software\r\nDirigida por Modelos', '["11"]', 95),
(36, 'Maratona de Empreendedorismo & Marketing', 40, 'LaboratÃ³rio I', 'ativo', 'oficina', '["27"]', ' ', '["36"]', 0),
(38, 'Minicurso', 30, 'LaboratÃ³rio I', 'ativo', 'oficina', '["25"]', 'IntroduÃ§Ã£o Ã \r\nEngenharia Reversa', '["26"]', 14),
(39, 'Minicurso', 30, 'LaboratÃ³rio II', 'ativo', 'oficina', '["26"]', 'IntroduÃ§Ã£o Ã \r\nCertificaÃ§Ã£o\r\nDigital', '["27"]', 29),
(44, 'Minicurso', 30, 'LaboratÃ³rio II', 'ativo', 'oficina', '["28"]', 'IntroduÃ§Ã£o Ã \r\nSeguranÃ§a de\r\nRedes sem Fio', '["28"]', 27),
(46, 'Minicurso', 30, 'LaboratÃ³rio I', 'ativo', 'oficina', '["36"]', 'App Inventor', '["1"]', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_palestrante`
--

CREATE TABLE IF NOT EXISTS `atividade_palestrante` (
  `id_palestrante` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_participante`
--

CREATE TABLE IF NOT EXISTS `atividade_participante` (
  `id_participante` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `vagas_ocupadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividade_participante`
--

INSERT INTO `atividade_participante` (`id_participante`, `id_atividade`, `vagas_ocupadas`) VALUES
(40, 24, 0),
(40, 30, 0),
(40, 38, 0),
(41, 30, 0),
(41, 38, 0),
(42, 25, 0),
(43, 10, 0),
(43, 19, 0),
(43, 25, 0),
(43, 39, 0),
(44, 12, 0),
(44, 15, 0),
(44, 23, 0),
(44, 30, 0),
(44, 38, 0),
(44, 46, 0),
(45, 12, 0),
(45, 19, 0),
(45, 20, 0),
(45, 25, 0),
(45, 27, 0),
(45, 31, 0),
(45, 32, 0),
(45, 33, 0),
(45, 38, 0),
(45, 46, 0),
(46, 12, 0),
(46, 19, 0),
(46, 20, 0),
(46, 25, 0),
(46, 27, 0),
(46, 31, 0),
(46, 32, 0),
(46, 33, 0),
(46, 38, 0),
(46, 46, 0),
(47, 17, 0),
(47, 18, 0),
(47, 24, 0),
(47, 30, 0),
(47, 38, 0),
(48, 25, 0),
(48, 30, 0),
(48, 38, 0),
(49, 12, 0),
(49, 17, 0),
(49, 18, 0),
(49, 20, 0),
(49, 25, 0),
(49, 30, 0),
(49, 38, 0),
(49, 46, 0),
(50, 12, 0),
(50, 19, 0),
(50, 25, 0),
(50, 27, 0),
(50, 31, 0),
(50, 32, 0),
(50, 33, 0),
(50, 38, 0),
(50, 46, 0),
(51, 12, 0),
(51, 15, 0),
(51, 16, 0),
(51, 20, 0),
(51, 25, 0),
(51, 30, 0),
(51, 38, 0),
(51, 46, 0),
(52, 10, 0),
(52, 15, 0),
(52, 16, 0),
(52, 20, 0),
(52, 25, 0),
(52, 30, 0),
(52, 38, 0),
(52, 46, 0),
(53, 25, 0),
(53, 30, 0),
(53, 38, 0),
(53, 46, 0),
(54, 15, 0),
(54, 16, 0),
(54, 20, 0),
(54, 25, 0),
(54, 30, 0),
(54, 38, 0),
(54, 46, 0),
(55, 11, 0),
(55, 25, 0),
(55, 30, 0),
(55, 38, 0),
(56, 11, 0),
(56, 15, 0),
(56, 16, 0),
(56, 20, 0),
(56, 25, 0),
(56, 27, 0),
(56, 31, 0),
(56, 32, 0),
(56, 33, 0),
(56, 38, 0),
(56, 46, 0),
(57, 11, 0),
(57, 25, 0),
(57, 30, 0),
(57, 38, 0),
(58, 12, 0),
(58, 15, 0),
(58, 16, 0),
(58, 20, 0),
(58, 25, 0),
(58, 31, 0),
(58, 32, 0),
(58, 33, 0),
(58, 44, 0),
(58, 46, 0),
(59, 10, 0),
(59, 15, 0),
(59, 16, 0),
(59, 19, 0),
(59, 20, 0),
(59, 23, 0),
(59, 30, 0),
(59, 46, 0),
(60, 10, 0),
(60, 15, 0),
(60, 16, 0),
(60, 19, 0),
(60, 20, 0),
(60, 23, 0),
(60, 30, 0),
(60, 46, 0),
(61, 15, 0),
(61, 30, 0),
(61, 44, 0),
(61, 46, 0),
(62, 10, 0),
(62, 19, 0),
(62, 23, 0),
(62, 44, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mapa`
--

CREATE TABLE IF NOT EXISTS `mapa` (
`id_mapa` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `dia` date NOT NULL,
  `inicio` time NOT NULL,
  `termino` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mapa`
--

INSERT INTO `mapa` (`id_mapa`, `nome`, `dia`, `inicio`, `termino`) VALUES
(5, 'M01', '2016-08-22', '10:00:00', '12:00:00'),
(6, 'M02', '2016-08-22', '14:00:00', '15:00:00'),
(7, 'M03', '2016-08-22', '15:00:00', '17:00:00'),
(8, 'M04', '2016-08-23', '09:00:00', '10:00:00'),
(9, 'M05', '2016-08-23', '10:00:00', '11:00:00'),
(10, 'M06', '2016-08-23', '11:00:00', '12:00:00'),
(11, 'M07', '2016-08-23', '09:00:00', '12:00:00'),
(12, 'M08', '2016-08-23', '14:00:00', '15:00:00'),
(13, 'M09', '2016-08-23', '15:00:00', '17:00:00'),
(14, 'M10', '2016-08-23', '14:00:00', '17:00:00'),
(15, 'M11', '2016-08-24', '09:00:00', '10:00:00'),
(16, 'M12', '2016-08-24', '10:00:00', '11:00:00'),
(17, 'M13', '2016-08-24', '11:00:00', '12:00:00'),
(18, 'M14', '2016-08-24', '10:00:00', '12:00:00'),
(19, 'M15', '2016-08-24', '14:00:00', '15:00:00'),
(20, 'M16', '2016-08-24', '15:00:00', '17:00:00'),
(21, 'M17', '2016-08-24', '14:00:00', '17:00:00'),
(22, 'M18', '2016-08-25', '09:00:00', '10:00:00'),
(23, 'M19', '2016-08-25', '10:00:00', '11:00:00'),
(24, 'M20', '2016-08-25', '09:00:00', '12:00:00'),
(25, 'M21', '2016-08-25', '08:00:00', '18:00:00'),
(26, 'M22', '2016-08-25', '08:00:00', '12:00:00'),
(27, 'M23', '2016-08-25', '09:00:00', '17:00:00'),
(28, 'M24', '2016-08-25', '14:00:00', '17:00:00'),
(29, 'M25', '2016-08-25', '15:00:00', '16:00:00'),
(30, 'M26', '2016-08-25', '16:00:00', '17:00:00'),
(31, 'M27', '2016-08-25', '14:00:00', '18:00:00'),
(32, 'M28', '2016-08-25', '16:00:00', '18:00:00'),
(33, 'M29', '2016-08-26', '08:00:00', '09:00:00'),
(34, 'M30', '2016-08-26', '09:00:00', '10:00:00'),
(35, 'M31', '2016-08-26', '10:00:00', '11:00:00'),
(36, 'M32', '2016-08-26', '10:00:00', '12:00:00'),
(37, 'M33', '2016-08-26', '17:00:00', '18:00:00'),
(38, 'M33', '2016-08-23', '10:00:00', '12:00:00'),
(39, 'M34', '2016-08-25', '14:00:00', '15:30:00'),
(40, 'M35', '2016-08-25', '15:30:00', '17:00:00'),
(41, 'M36', '2016-08-24', '09:00:00', '17:00:00');

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
  `gplus` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `palestrante`
--

INSERT INTO `palestrante` (`id_palestrante`, `nome`, `descricao`, `facebook`, `twitter`, `gplus`) VALUES
(0, 'Profa. Dra. Maria Viviane de Menezes', '', '', '', ''),
(1, 'Paloma Bispo', NULL, NULL, NULL, NULL),
(2, 'Prof. Paulo de Tarso', '\0', NULL, NULL, NULL),
(3, 'Alunos LINCE-IA', NULL, NULL, NULL, NULL),
(4, 'Profa. Graziela Simone ', '', NULL, NULL, NULL),
(5, 'Prof. Danilo Reis de Vasconcelos', NULL, NULL, NULL, NULL),
(6, 'AndrÃ© Campos', NULL, NULL, NULL, NULL),
(7, 'InÃ¡cio Arruda', NULL, NULL, NULL, NULL),
(8, 'Prof. Eurico', NULL, NULL, NULL, NULL),
(9, 'Pablo Alfredo Saip Baier', NULL, NULL, NULL, NULL),
(10, 'Aderson Oliveira', NULL, NULL, NULL, NULL),
(11, 'Prof. Paulo Henrique Mendes Maia', NULL, NULL, NULL, NULL),
(12, 'Marcos Vinicius de Freitas Borge', NULL, NULL, NULL, NULL),
(13, 'Profa. Ingrid Monteiro', NULL, NULL, NULL, NULL),
(14, 'Davidson, Matheus', NULL, NULL, NULL, NULL),
(15, 'Amarildo Maia Rolim', 'DivisÃ£o de SeguranÃ§a da InformaÃ§Ã£o -DSEG Secretaria de Tecnologia da InformaÃ§Ã£o - STI Universidade Federal do CearÃ¡ - UFC', NULL, NULL, NULL),
(16, 'Sandy Macie. ', NULL, NULL, NULL, NULL),
(17, 'Profa. Ingrid,Prof. Eurico', NULL, NULL, NULL, NULL),
(18, 'Prof. Paulo de Tarso,Prof. Paulo Henrique', NULL, NULL, NULL, NULL),
(19, 'Yan Vancelis', NULL, NULL, NULL, NULL),
(20, 'Maury Lukas Freitas', NULL, NULL, NULL, NULL),
(21, 'Ms. Felipe Maciel e Micael Ferreira', NULL, NULL, NULL, NULL),
(22, 'Leon, Afonso , Paloma', NULL, NULL, NULL, NULL),
(23, 'Erick Barros', NULL, NULL, NULL, NULL),
(24, 'Aluno do PH(UECE)', NULL, NULL, NULL, NULL),
(25, 'FÃ¡bio Marques Theophilo', NULL, NULL, NULL, NULL),
(26, 'Luiz Gonzaga Mota Barbosa', NULL, NULL, NULL, NULL),
(27, 'Rafael Bezerra Firmo', NULL, NULL, NULL, NULL),
(28, 'Hugo Bernardo Bonfim Martins', NULL, NULL, NULL, NULL),
(29, 'Jeferson Juliani', 'Estudante de Engenharia de software', NULL, NULL, NULL),
(30, 'Profa. Graziela', NULL, NULL, NULL, NULL),
(31, 'Amanda Souza da\r\nSilva', NULL, NULL, NULL, NULL),
(32, 'Aguardo', NULL, NULL, NULL, NULL),
(33, 'Prof. Dr. Konrad Utz', NULL, NULL, NULL, NULL),
(34, 'Wildner Linz', NULL, NULL, NULL, NULL),
(35, 'Marcelo Victor', 'Analista TÃ©cnico SEBRAE', NULL, NULL, NULL),
(36, 'Alunos de Engenharia de Software', NULL, NULL, NULL, NULL),
(37, 'Micael Ferreira', 'Estudante de Engenharia de software', NULL, NULL, NULL),
(38, 'Empresa Endeavour', NULL, NULL, NULL, NULL),
(39, 'Prof. Dr. Dmontier AragÃ£o Jr.', NULL, NULL, NULL, NULL),
(40, 'Aguardando', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestranteid`
--

CREATE TABLE IF NOT EXISTS `palestranteid` (
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `gplus` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participante`
--

CREATE TABLE IF NOT EXISTS `participante` (
`id_participante` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone1` varchar(15) NOT NULL,
  `cep` varchar(15) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participante`
--

INSERT INTO `participante` (`id_participante`, `nome`, `cpf`, `email`, `telefone1`, `cep`, `cidade`, `uf`, `data_nasc`, `escolaridade`, `ocupacao`, `iniciativa`, `instensino`, `sexo`, `status`, `data_cadastro`) VALUES
(40, 'Mateus Santos Oliveira', '06850887580', 'mateusteknus@gmail.com', '(88) 99944-8037', '62900-000', 'Russas', 'CE', '1997-02-03', 'Superior Incompleto', 'estudante', 'publica', 'Universidade Federal do CearÃ¡', 'm', 0, '2016-08-15'),
(41, 'Jeferson da Silva Juliani', '13308715619', 'jeferson.engsoftware@gmail.com', '(88) 98861-0022', '62900-000', 'Russas', 'CE', '1996-01-31', 'Superior Incompleto', '', 'publica', 'Universidade Federal do CearÃ¡', 'm', 0, '2016-08-15'),
(42, 'Yan Vancelis de AraÃºjo Lima', '05997727351', 'yanvancelis@gmail.com', '(88) 99917-6363', '62900-000', 'Russas', 'CE', '1969-12-31', 'Superior Incompleto', 'estudante', 'publica', 'Universidade Federal do CearÃ¡', 'm', 0, '2016-08-15'),
(43, 'Matheus Souza Carneiro', '04903627373', 'matheusscarneiro.ufc@gmail.com', '(88) 99869-7439', '62960-000', 'Tabuleiro do Norte', 'CE', '1969-12-31', 'Fundamental Incompleto', '', 'publica', 'UFC', '', 0, '2016-08-16'),
(44, 'Thayrio Amorim Rodrigues', '02637404396', 'thayrio@hotmail.com', '(89) 99900-1551', '62900-000', 'Russas', 'CE', '1969-12-31', 'Fundamental Incompleto', '', 'publica', 'IFPI', '', 0, '2016-08-16'),
(45, 'Carlos Victor Dantas Araujo', '06559571386', 'victordantasdantas97@gmail.com', '(88) 92449-966', '62970-000', 'Alto Santo', 'CE', '1997-07-02', 'Fundamental Incompleto', 'estudante', 'publica', 'Universidade Federal do CearÃ¡ - UFC', 'm', 0, '2016-08-16'),
(46, 'isaac rahel martim oliveira', '07192155365', 'isaac_rahel@live.com', '(88) 81160-590', '62903-000', 'Flores                                  								(Russas)', 'CE', '1969-12-31', 'Superior Incompleto', 'estudante', 'publica', 'Universidade Federal do ceara', 'm', 0, '2016-08-16'),
(47, 'Paloma Bispo dos Santos Silva', '06628713598', 'gsromance@hotmail.com', '(88) 99705-9406', '62900-000', 'Russas', 'CE', '1997-04-09', 'Fundamental Incompleto', '', 'publica', 'Universidade Federal do CearÃ¡', '', 0, '2016-08-16'),
(48, 'Isaias Ferreira Soares', '06985503314', 'isaiasfs1997@hotmail.com', '(88) 99651-3051', '62900-000', 'Russas', 'CE', '1969-12-31', 'Superior Incompleto', 'estudante', 'publica', 'Universidade Federal do Ceara', 'm', 0, '2016-08-16'),
(49, 'MarÃ­lia Cristina do Carmo Viana', '05925512375', 'mariliacristinacarmo@gmail.com', '(88) 99617-0377', '62900-000', 'Russas', 'CE', '1969-12-31', 'Fundamental Incompleto', '', 'publica', 'Universidade Federal do CearÃ¡', '', 0, '2016-08-16'),
(50, 'Thomas Dillan Baltazar MendonÃ§a ', '07017379306', 'thomas_dillan@hotmail.com', '(88) 98140-9910', '62903-000', 'Flores                                								(Russas)', 'CE', '1969-12-31', 'Fundamental Incompleto', '', 'publica', 'Universidade Federal do CearÃ¡ ', '', 0, '2016-08-16'),
(51, 'Erik Almeida Moura', '06305117306', 'erikalmeida54@yahoo.com', '(88) 99479-0272', '62900-000', 'Russas', 'CE', '1969-12-31', 'Superior Incompleto', 'estudante', 'publica', 'UFC - Russas', 'm', 0, '2016-08-16'),
(52, 'Anderson Ferreira da Silva ', '05762509370', 'andersonferreiracontato03@gmail.com', '(85) 99957-0625', '62900-000', 'Russas', 'CE', '1995-06-09', 'Superior Incompleto', 'estudante', 'publica', 'Universidade Federal do CearÃ¡ ', 'm', 0, '2016-08-16'),
(53, 'Hugo Venancio CHaves de Souza', '02317391331', 'hugodmvenancio@outlook.com', '(88) 99661-5775', '62960-000', 'Tabuleiro do Norte', 'CE', '1969-12-31', 'Superior Incompleto', 'estudante', 'publica', 'Universidade Federal do CearÃ¡', 'm', 0, '2016-08-16'),
(54, 'VinÃ­cius Almeida SIlva', '06803049329', 'almeidavinicius08@gmail.com', '(88) 99406-6343', '62900-000', 'Russas', 'CE', '1997-08-07', 'Fundamental Incompleto', 'estudante', 'publica', 'Universidade Federal do CearÃ¡', 'm', 0, '2016-08-16'),
(55, 'MARCOS DE ALENCAR CARVALHO', '07179632414', 'marcoscarvalho1997@gmail.com', '(97) 99637-0590', '56200-000', 'Ouricuri', 'PE', '1997-07-04', 'Fundamental Incompleto', 'estudante', 'publica', 'UFC - Campus Russas', 'm', 0, '2016-08-16'),
(56, 'Renan Leite Silva', '41502206897', 'renan1952008@hotmail.com', '(11) 98141-4206', '62900-000', 'Russas', 'CE', '1969-12-31', 'Superior Incompleto', 'estudante', 'publica', 'UFC - Campus Russas', 'm', 0, '2016-08-16'),
(57, 'Alex Frederico Mathias Felix de Melo', '06803550303', 'alexfredericomfm@gmail.com', '(85) 99705-8288', '62900-000', 'Russas', 'CE', '1969-12-31', 'MÃ©dio Completo', 'estudante', 'publica', 'Universidade Federal do Ceara', 'm', 0, '2016-08-16'),
(58, 'Francisca TÃ¡gila Lima da Silva', '06420219370', 'tagila.lima96@gmail.com', '(88) 99403-3646', '62900-000', 'Russas', 'CE', '1969-12-31', 'Fundamental Incompleto', '', 'publica', 'Universidade Federal do CearÃ¡', '', 0, '2016-08-16'),
(59, 'Carlos RobÃ©rio dos Santos', '00769302386', 'roberioschneider@gmail.com', '(88) 94764-935', '62823-000', 'Jaguaruana', 'CE', '1994-11-08', 'Superior Incompleto', 'estudante', 'publica', 'Universidade Federal do CearÃ¡', 'm', 0, '2016-08-16'),
(60, 'Jonas Mateus de Oliveira Ferreira', '07223999365', 'jonasmateus977@facebook.com', '(88) 99353-1774', '62823-000', 'Jaguaruana', 'CE', '1998-06-01', 'Fundamental Incompleto', '', 'publica', 'Universidade Federal do CearÃ¡', '', 0, '2016-08-16'),
(61, 'Maria Rayanne Rocha Silva', '06110334375', 'mrayanne28@gmail.com', '(88) 99805-9710', '62823-000', 'Jaguaruana', 'CE', '1969-12-31', 'Superior Incompleto', 'estudante', 'publica', 'Universidade Federal do CearÃ¡', 'f', 0, '2016-08-16'),
(62, 'Marcelo dos Santos Estevam', '05993207370', 'marcelo.estevam15@gmail.com', '(88) 99407-8971', '62930-000', 'Limoeiro do Norte', 'CE', '1969-12-31', 'Superior Incompleto', 'estudante', 'publica', 'UFC', 'm', 0, '2016-08-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(41) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `data_acesso` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `senha`, `nome`, `data_acesso`) VALUES
(2, 'marking96', '356a192b7913b04c54574d18c28d46e6395428ab', 'Marcelo Estevam', '2016-08-16'),
(3, 'teknus', '356a192b7913b04c54574d18c28d46e6395428ab', 'Mateus Oliveira', '2016-08-16'),
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
 ADD KEY `atividade_palestrante_ibfk_1` (`id_palestrante`), ADD KEY `atividade_palestrante_ibfk_2` (`id_atividade`);

--
-- Indexes for table `atividade_participante`
--
ALTER TABLE `atividade_participante`
 ADD KEY `atividade_participante_ibfk_1` (`id_atividade`), ADD KEY `atividade_participante_ibfk_2` (`id_participante`);

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
MODIFY `id_atividade` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `mapa`
--
ALTER TABLE `mapa`
MODIFY `id_mapa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `participante`
--
ALTER TABLE `participante`
MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
