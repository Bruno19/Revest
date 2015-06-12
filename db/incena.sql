-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2015 às 01:21
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `clipping`
--

INSERT INTO `clipping` (`id_c`, `title_c`, `content_c`, `url_c`, `type_c`) VALUES
(1, 'teste', 'tse asdas dasd asd asd asd as', 'teste', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id_no`, `title_no`, `content_no`, `image1_no`, `image2_no`, `image3_no`, `image4_no`, `date_no`, `type_no`) VALUES
(3, 'Donation Test', '<p>Donation Test test test test asdas das</p>', 'b73f0f9bf83dbb117a7a5029a8dd754d.jpg', '7714515c01608ec73897f1128bf426f6.jpg', '1abd3f3b083f20871103540b0a1c6be3.jpg', 'fd8c6f9f629bb33cd38d3e7f0b866002.jpg', '2015-06-11 00:53:33', 2),
(4, 'Donation test 2', '<p>asdasdasd adasdasdasdasdasdasd</p>', 'none.jpg', 'none.jpg', 'none.jpg', 'none.jpg', '2015-06-11 00:54:20', 2),
(5, 'News Test', '<p>News Test testt tsetes tsetset</p>', 'abf48ab3dc94d9cdf12e4d43589657e9.jpg', 'none.jpg', 'none.jpg', 'none.jpg', '2015-06-11 00:56:14', 1);

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
(2, 'Lucas Veríssimo', 'lucasverissimo', 'teste@email.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
