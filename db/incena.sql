-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jun-2015 às 17:57
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `incena`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clipping`
--

CREATE TABLE IF NOT EXISTS `clipping` (
  `id_c` int(11) NOT NULL AUTO_INCREMENT,
  `title_c` varchar(120) NOT NULL,
  `content_c` text NOT NULL,
  `url_c` varchar(150) NOT NULL,
  `type_c` int(11) NOT NULL,
  PRIMARY KEY (`id_c`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `images_pr`
--

CREATE TABLE IF NOT EXISTS `images_pr` (
  `id_im` int(11) NOT NULL AUTO_INCREMENT,
  `id_pr` int(11) NOT NULL,
  `name_im` varchar(50) NOT NULL,
  `text_im` varchar(250) NOT NULL,
  PRIMARY KEY (`id_im`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_no` int(11) NOT NULL AUTO_INCREMENT,
  `title_no` varchar(150) NOT NULL,
  `content_no` text NOT NULL,
  `image1_no` varchar(50) NOT NULL DEFAULT 'none.jpg',
  `image2_no` varchar(50) NOT NULL DEFAULT 'none.jpg',
  `image3_no` varchar(50) NOT NULL DEFAULT 'none.jpg',
  `image4_no` varchar(50) NOT NULL DEFAULT 'none.jpg',
  `date_no` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_no` int(11) NOT NULL,
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orgaos`
--

CREATE TABLE IF NOT EXISTS `orgaos` (
  `id_or` int(11) NOT NULL AUTO_INCREMENT,
  `title_or` varchar(150) NOT NULL,
  `url_or` varchar(150) NOT NULL,
  PRIMARY KEY (`id_or`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id_pa` int(11) NOT NULL AUTO_INCREMENT,
  `image_pa` varchar(50) NOT NULL,
  `url_pa` varchar(150) NOT NULL,
  PRIMARY KEY (`id_pa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `partners`
--

INSERT INTO `partners` (`id_pa`, `image_pa`, `url_pa`) VALUES
(1, '0345b8f1c4c84753320887f79d921e65.jpg', ''),
(2, '1859e9e59e83ebad47073cfc9f4e3a47.jpg', ''),
(3, '06ead3e2166e7b1993b19ca221d3a151.jpg', ''),
(4, 'e9c31c0343773f579f7cb276889d2a39.jpg', ''),
(5, '4ec6ba72a057486f9ccdf0c2abd42ebf.png', 'http://www.google.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `title_pro` varchar(120) NOT NULL,
  `subtitle_pro` varchar(100) NOT NULL,
  `contact_pro` varchar(40) NOT NULL,
  `link_pro` varchar(150) NOT NULL,
  `about_pro` text NOT NULL,
  `featured_pro` int(11) NOT NULL,
  `image_pro` varchar(50) NOT NULL,
  `type_pro` int(11) NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id_pr` int(11) NOT NULL AUTO_INCREMENT,
  `name_pr` varchar(120) NOT NULL,
  `date_pr` date NOT NULL,
  PRIMARY KEY (`id_pr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicidade`
--

CREATE TABLE IF NOT EXISTS `publicidade` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `name_p` varchar(30) NOT NULL,
  `image_p` varchar(50) NOT NULL,
  `url_p` varchar(150) NOT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `publicidade`
--

INSERT INTO `publicidade` (`id_p`, `name_p`, `image_p`, `url_p`) VALUES
(1, 'topo1', '', 'teste'),
(2, 'topo2', '', 'http://teste.com.br'),
(3, 'topo3', '', 'http://teste.com.br'),
(4, 'centro1', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_us` int(11) NOT NULL AUTO_INCREMENT,
  `nome_us` varchar(60) NOT NULL,
  `usuario_us` varchar(32) NOT NULL,
  `email_us` varchar(80) NOT NULL,
  `senha_us` char(40) NOT NULL,
  PRIMARY KEY (`id_us`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_us`, `nome_us`, `usuario_us`, `email_us`, `senha_us`) VALUES
(2, 'Sr. Administrador', 'admin', 'teste@email.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
