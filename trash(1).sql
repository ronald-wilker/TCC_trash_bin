-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 31/10/2019 às 13:30
-- Versão do servidor: 5.7.27-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `trash`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `idcadastro` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `nome_escolal` varchar(45) DEFAULT NULL,
  `diciplina` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `nivel` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cadastro`
--

INSERT INTO `cadastro` (`idcadastro`, `nome`, `sexo`, `nome_escolal`, `diciplina`, `email`, `senha`, `nivel`) VALUES
(1, 'ronald wilker ', 'masculino', 'Antonio Castro', 'TCC', 'ronald.wil@hotmail.com.br', 'eb0a191797624dd3a48fa681d3061212', '2'),
(5, 'Norbbit Degget ', 'masculino', 'Antonio Messias', 'Geografia', 'nd@gmail.com', '8eb3b6897fcdeb5f6022e03317cd8076', '1'),
(6, 'tiago', 'masculino', 'Faculdade META', 'Desenvolvimento', 'tiago@hotmail.com', '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `desc_cat` varchar(45) DEFAULT NULL,
  `nome_cat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `desc_cat`, `nome_cat`) VALUES
(1, 'jogos com o tema voltados para arte.', 'arte'),
(2, ' jogos com o tema voltados para Ciências', 'ciencia'),
(3, 'jogos com o tema voltados para Ed. Física', 'educação fisica'),
(4, 'jogos com o tema voltados para Geografia', 'geografia'),
(5, 'jogos com o tema voltados para História', 'historia'),
(6, 'jogos com o tema voltados para Inglês.', 'ingles'),
(7, 'jogos com tema voltados para Lín.Portuguesa.', 'ling.portuguesa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL,
  `comentario` varchar(400) DEFAULT NULL,
  `datacomentario` date DEFAULT NULL,
  `hora` varchar(5) DEFAULT NULL,
  `cadastro_idcadastro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `comentario`
--

INSERT INTO `comentario` (`idcomentario`, `comentario`, `datacomentario`, `hora`, `cadastro_idcadastro`) VALUES
(9, 'sonhos n&atilde;o s&atilde;o alcansandos por palavras! mais por a&ccedil;&otilde;es!! mais palavras podem destruir sonhos!!', '2019-10-26', '01:20', 1),
(16, 'tentando entender a hora', '2019-10-26', '01:49', 1),
(17, 'tranquilo lololo', '2019-10-26', '01:52', 1),
(21, 'eu sou o homem de ferro.', '2019-10-27', '16:24', 5),
(22, 'Ser ou n&atilde;o ser, eis a quest&atilde;o.', '2019-10-27', '16:25', 5),
(23, 'Tr&ecirc;s.', '2019-10-27', '16:25', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `games`
--

CREATE TABLE `games` (
  `idgames` int(11) NOT NULL,
  `nomejogo` varchar(45) NOT NULL,
  `desc_jogo` mediumtext,
  `Nensino` varchar(45) DEFAULT NULL,
  `Ccuricular` varchar(25) DEFAULT NULL,
  `desc_min` varchar(400) DEFAULT NULL,
  `tema` varchar(45) DEFAULT NULL,
  `serie` varchar(60) DEFAULT NULL,
  `idade` varchar(45) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  `nivel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `games`
--

INSERT INTO `games` (`idgames`, `nomejogo`, `desc_jogo`, `Nensino`, `Ccuricular`, `desc_min`, `tema`, `serie`, `idade`, `categoria_idcategoria`, `nivel`) VALUES
(1, 'Trash Bin', 'Na fase 01, preste aten&ccedil;&atilde;o nos res&iacute;duos e nas lixeiras em que cada tipo pertence e apanhe-os\r\n      de acordo com as cores correspondentes.\r\n      Na fase 02, encontre os pares correspondentes pondo em pr&aacute;tica o que voc&ecirc; aprendeu sobre separa&ccedil;&atilde;o\r\n      de res&iacute;duos e os materiais que foram aproveitados para reuso.', 'Ensino Fundamental I', 'Ci&ecirc;ncias', 'Estimular os alunos a identificar os materiais que podem ser reciclados, a separar os materiais segundo sua origem:(metal,  papel, pl&aacute;stico, org&acirc;nico e vidro), e a desenvolver conscientiza&ccedil;&atilde;o sobre as diferentes formas de coleta e\r\n         de destino do lixo em seu cotidiano.', 'Ci&ecirc;ncias Naturais: Ambiente', '2&deg; Est&aacute;gio: 1&deg; Ano, 2&deg; Ano, 3&deg; Ano', '05 &aacute; 09 anos', 2, 'facil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imgUser`
--

CREATE TABLE `imgUser` (
  `idimgUser` int(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `imagem` varchar(220) DEFAULT NULL,
  `cadastro_idcadastro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `imgUser`
--

INSERT INTO `imgUser` (`idimgUser`, `nome`, `imagem`, `cadastro_idcadastro`) VALUES
(5, '1 ', '1 .png', 1),
(6, '6 ', '6 .png', 6);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`idcadastro`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `fk_comentario_cadastro1_idx` (`cadastro_idcadastro`);

--
-- Índices de tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`idgames`),
  ADD KEY `fk_games_categoria1_idx` (`categoria_idcategoria`);

--
-- Índices de tabela `imgUser`
--
ALTER TABLE `imgUser`
  ADD PRIMARY KEY (`idimgUser`),
  ADD KEY `fk_imgUser_cadastro1_idx` (`cadastro_idcadastro`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `idcadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `idgames` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `imgUser`
--
ALTER TABLE `imgUser`
  MODIFY `idimgUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_cadastro1` FOREIGN KEY (`cadastro_idcadastro`) REFERENCES `cadastro` (`idcadastro`);

--
-- Restrições para tabelas `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_games_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Restrições para tabelas `imgUser`
--
ALTER TABLE `imgUser`
  ADD CONSTRAINT `fk_imgUser_cadastro1` FOREIGN KEY (`cadastro_idcadastro`) REFERENCES `cadastro` (`idcadastro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
