-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Nov-2019 às 14:41
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `cd` int(11) NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`cd`, `nome`, `email`, `celular`, `mensagem`) VALUES
(1, 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `cdpost` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumo` text NOT NULL,
  `texto` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `posicao` varchar(5) NOT NULL DEFAULT 'right',
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`cdpost`, `titulo`, `resumo`, `texto`, `imagem`, `posicao`, `data`) VALUES
(2, 'Lorem lorem', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet ullamcorper augue. Etiam eu sollicitudin dui. In non vehicula libero. Praesent justo dui, blandit id tempor varius, luctus ut erat. Etiam pellentesque  ', '  \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet ullamcorper augue. Etiam eu sollicitudin dui. In non vehicula libero. Praesent justo dui, blandit id tempor varius, luctus ut erat. Etiam pellentesque vulputate dui ut elementum. Quisque vitae euismod ante. Suspendisse dui tortor, sagittis vitae nisi a, tristique luctus dolor. Proin pretium mi a fermentum condimentum. Vestibulum quis ante ut mauris sodales tempus vestibulum non eros. Fusce id leo a metus ultricies lacinia. Curabitur egestas mi quis est pulvinar, et tincidunt diam volutpat. Aliquam orci orci, vehicula volutpat ex in, elementum placerat diam. Suspendisse rutrum ultrices libero. Pellentesque egestas leo sit amet urna consectetur, ut placerat erat tempus. Mauris posuere metus sed ex consectetur, cursus sagittis augue porttitor. Suspendisse magna ante, egestas id volutpat a, ornare vitae orci.\r\n\r\nPellentesque massa massa, imperdiet vel odio vel, feugiat varius odio. Nunc magna eros, cursus at velit non, hendrerit finibus leo. Proin id fringilla nisl, eu dapibus enim. Donec pellentesque gravida posuere. Sed in sollicitudin sapien. Quisque finibus est a mi ullamcorper accumsan. Quisque interdum mauris vel velit consectetur, in dictum mauris pharetra.\r\n\r\nNullam sed metus metus. Praesent non mauris fermentum, lacinia nisl eu, placerat ipsum. Cras porttitor lectus a augue aliquet, quis auctor enim bibendum. Proin dapibus maximus pretium. Vivamus dignissim accumsan augue, nec tempor urna vulputate vitae. Nulla facilisi. Maecenas est libero, egestas sit amet dolor non, pellentesque iaculis ipsum.\r\n\r\nNulla imperdiet orci quis magna semper imperdiet. Cras id ante consequat, fringilla ipsum vel, molestie sem. Aenean non velit aliquam, lacinia ex ac, venenatis nulla. Quisque vitae consequat augue, non auctor ante. Vestibulum non placerat nibh. Integer posuere tempus consequat. Sed vehicula ullamcorper tellus. Praesent consectetur ligula et pellentesque dignissim.\r\n\r\nProin ac fringilla ex, at blandit nulla. Donec eu mauris lobortis, consequat leo ut, pellentesque ex. In enim dolor, varius ac mauris quis, condimentum eleifend libero. Cras ullamcorper tellus nec est eleifend, vitae consectetur est vulputate. Etiam mi ex, accumsan vel eleifend id, fringilla eget libero. Mauris aliquam gravida efficitur. Praesent finibus sagittis nunc. Morbi erat urna, dapibus in finibus ac, pellentesque sed tellus. Integer feugiat, ipsum non consectetur fringilla, tortor nunc tincidunt arcu, in vehicula enim metus vel leo. Mauris euismod facilisis dignissim. Aliquam sit amet ex magna. Pellentesque mollis aliquam metus quis aliquet. Sed congue quam sit amet nulla dapibus, a volutpat ligula feugiat.   ', 'uploads/Koala.jpg', 'right', '2019-04-10'),
(20, 'Hoje tem prova pegada', '    Hoje dia 11/10/2019 terá uma prova pegada de Sistemas Operacionais, a expectativa é que o admin tire um 7 ou 8 nesta prova.    ', '    Hoje dia 11/10/2019 terá uma prova pegada de Sistemas Operacionais, a expectativa é que o admin tire um 7 ou 8 nesta prova.\r\nO conteudo da prova é constituído por Escalonamento, Principios Basicos de Sistemas Operacionais, Processos, Deadlock entre outras materias... \r\nEDIT: Tirei 9,5  ', 'uploads/Penguins.jpg', 'left', '2019-10-11'),
(21, 'Mussum ipsum', '  Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá, depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. ', '  Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá, depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.  ', 'uploads/Mussun.jpg', 'right', '2019-10-11');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`cd`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`cdpost`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `cdpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
