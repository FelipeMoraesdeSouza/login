-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Dez-2021 às 22:59
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdprojeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nome`, `email`) VALUES
(1, 'Juan', 'juan@gmail.com'),
(2, 'Marcia', 'marcia@gmail.com'),
(3, 'Pedro', 'pedro@gmail.com'),
(5, 'Manuela', 'manu@gmail.com'),
(10, 'teste', 'teste@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idproduto` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `estoquemax` int(11) NOT NULL,
  `estoquemin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idproduto`, `produto`, `preco`, `estoque`, `estoquemax`, `estoquemin`) VALUES
(1, 'Computador', 2500.00, 20, 30, 10),
(3, 'Notebook', 2670.00, 15, 15, 6),
(4, 'Mouse', 20.00, 30, 30, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblnivelacesso`
--

CREATE TABLE `tblnivelacesso` (
  `idnivelacesso` int(11) NOT NULL,
  `acesso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblnivelacesso`
--

INSERT INTO `tblnivelacesso` (`idnivelacesso`, `acesso`) VALUES
(1, 'Administrador'),
(2, 'Colaborador'),
(3, 'Usuário'),
(4, 'Fornecedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsituacao`
--

CREATE TABLE `tblsituacao` (
  `idsituacao` int(11) NOT NULL,
  `situacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblsituacao`
--

INSERT INTO `tblsituacao` (`idsituacao`, `situacao`) VALUES
(1, 'ativo'),
(2, 'inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `idsituacao` int(11) NOT NULL,
  `idnivelacesso` int(11) NOT NULL,
  `criado` date NOT NULL,
  `modificado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblusuarios`
--

INSERT INTO `tblusuarios` (`idusuario`, `nome`, `email`, `senha`, `idsituacao`, `idnivelacesso`, `criado`, `modificado`) VALUES
(1, 'juan', 'juanpablo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2021-12-01', '2021-12-01'),
(2, 'Márcia', 'marcia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '2021-12-02', '2021-12-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `idvenda` int(11) NOT NULL,
  `datavenda` date NOT NULL,
  `idvendedor` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `qtdvenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`idvenda`, `datavenda`, `idvendedor`, `idproduto`, `qtdvenda`) VALUES
(1, '2021-12-08', 1, 1, 3),
(2, '2021-12-09', 1, 1, 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idproduto`);

--
-- Índices para tabela `tblnivelacesso`
--
ALTER TABLE `tblnivelacesso`
  ADD PRIMARY KEY (`idnivelacesso`);

--
-- Índices para tabela `tblsituacao`
--
ALTER TABLE `tblsituacao`
  ADD PRIMARY KEY (`idsituacao`);

--
-- Índices para tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idvenda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblnivelacesso`
--
ALTER TABLE `tblnivelacesso`
  MODIFY `idnivelacesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblsituacao`
--
ALTER TABLE `tblsituacao`
  MODIFY `idsituacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
