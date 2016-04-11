-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 19-Fev-2014 às 00:55
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `cdzestagiodb`
--
CREATE DATABASE IF NOT EXISTS `cdzestagiodb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cdzestagiodb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `clie_cod` int(11) NOT NULL AUTO_INCREMENT,
  `clie_nome` varchar(200) NOT NULL,
  `clie_endereco` varchar(200) DEFAULT NULL,
  `clie_bairro` varchar(100) DEFAULT NULL,
  `clie_cep` char(9) DEFAULT NULL,
  `clie_fone` varchar(13) NOT NULL,
  `clie_email` varchar(255) NOT NULL,
  PRIMARY KEY (`clie_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`clie_cod`, `clie_nome`, `clie_endereco`, `clie_bairro`, `clie_cep`, `clie_fone`, `clie_email`) VALUES
(6, 'Selma Marques da Silva Nunes', 'Av. Jorge Amado', 'Imbui', '41181-435', '(71)8765-2230', 'selma@selma.com'),
(7, 'Laio Felipe Nunes Pinheiro', 'Rua Teodulo de Albuquerque', 'Cabula VI', '41181-010', '(71)9216-8764', 'laiopinheiro01@gmail.com'),
(8, 'Ana Karolina Ferreira Nunes', 'Avenida Luis Viana Filho', 'Doron', '45000-000', '(71)9375-4325', 'karol@karol.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE IF NOT EXISTS `orcamento` (
  `orca_cod` int(11) NOT NULL AUTO_INCREMENT,
  `orca_data` date NOT NULL,
  `orca_data_retorno` date DEFAULT NULL,
  `orca_data_validade` date NOT NULL,
  `orca_clie_cod` int(11) NOT NULL,
  `orca_prod_cod_1` int(11) NOT NULL,
  `orca_condicoes` varchar(500) DEFAULT NULL,
  `orca_objecoes` varchar(500) DEFAULT NULL,
  `orca_prod_cod_2` int(11) DEFAULT NULL,
  `orca_prod_cod_3` int(11) DEFAULT NULL,
  PRIMARY KEY (`orca_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`orca_cod`, `orca_data`, `orca_data_retorno`, `orca_data_validade`, `orca_clie_cod`, `orca_prod_cod_1`, `orca_condicoes`, `orca_objecoes`, `orca_prod_cod_2`, `orca_prod_cod_3`) VALUES
(8, '2014-02-16', '2014-02-19', '2014-02-26', 7, 4, 'Entrega Imediata', 'Nenhuma Objecao', 2, NULL),
(9, '2014-02-17', '2014-02-25', '2014-03-03', 8, 3, 'Parcelamento em 24 vezes', 'Entrega em domicilio', 2, 4),
(10, '2014-02-19', '2014-02-20', '2014-02-28', 6, 4, 'Parcelamento em 64 vezes, no cartao mastercard. Entrega em CamaÃ§ari atÃ© dia 25/03/2014', 'Nenhuma objecao', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `prod_cod` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nome` varchar(200) NOT NULL,
  `prod_medida` varchar(45) DEFAULT NULL,
  `prod_valor` varchar(13) NOT NULL,
  PRIMARY KEY (`prod_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`prod_cod`, `prod_nome`, `prod_medida`, `prod_valor`) VALUES
(2, 'GalÃ£o de Tinta', '20 Litros', '109.87'),
(3, 'Saco de Cimento', '50 KG', '65.00'),
(4, 'Areia', '1 caminhÃ£o', '199.99');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
