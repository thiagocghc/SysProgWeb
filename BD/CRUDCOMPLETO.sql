-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Nov-2022 às 00:07
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crudcompleto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(5) DEFAULT NULL,
  `data` varchar(25) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `telefone`, `senha`, `tipo`, `data`, `path`) VALUES
(18, 'Teodoro da Silva', 'theo@teodoro.com', '444444444', 'caf1a3dfb505ffed0d024130f58c5cfa', 'user', '22/09/2022 13:12', ' $ ./uploads/fotos/632c89714f98f.jpg'),
(19, 'Sampaio Silva', 'sampa@io.com', '323232', 'caf1a3dfb505ffed0d024130f58c5cfa', 'user', '22/09/2022 13:29', './uploads/fotos/632c8d654ffe0.jpg'),
(20, 'LEONARDO ANTONIO OLIVEIRA', 'leosilva@silva.com', '6799999999', '550a141f12de6341fba65b0ad0433500', 'user', '03/10/2022 18:13', './uploads/fotos/633b506c0864a.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `id_item` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_venda` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `item_venda`
--

INSERT INTO `item_venda` (`id_item`, `id_produto`, `id_venda`, `quantidade`, `preco_unitario`, `total`) VALUES
(1, 68, 8, 68, '6800.00', '6800.00'),
(2, 69, 9, 69, '7200.00', '7200.00'),
(3, 0, 10, 0, '0.00', '0.00'),
(4, 0, 11, 0, '0.00', '0.00'),
(5, 0, 12, 0, '0.00', '0.00'),
(6, 0, 13, 0, '0.00', '0.00'),
(7, 0, 14, 0, '0.00', '0.00'),
(8, 0, 15, 0, '0.00', '0.00'),
(9, 0, 16, 0, '0.00', '0.00'),
(10, 0, 17, 0, '0.00', '0.00'),
(11, 0, 18, 0, '0.00', '0.00'),
(12, 3, 19, 1, '2100.00', '2100.00'),
(13, 5, 20, 1, '99.00', '99.00'),
(14, 5, 21, 1, '99.00', '99.00'),
(15, 5, 22, 4, '99.00', '99.00'),
(16, 5, 23, 3, '99.00', '297.00'),
(17, 3, 24, 3, '1499.00', '4497.00'),
(18, 2, 25, 2, '599.00', '1198.00'),
(19, 3, 26, 4, '1499.00', '5996.00'),
(20, 5, 27, 12, '99.00', '1188.00'),
(21, 4, 28, 3, '99.00', '297.00'),
(22, 3, 29, 2, '1499.00', '2998.00'),
(23, 3, 30, 2, '1499.00', '2998.00'),
(24, 3, 31, 3, '799.00', '2397.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_prod` int(4) NOT NULL,
  `nome_prod` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `nome_prod`, `descricao`, `preco`, `tipo`) VALUES
(2, 'New Wave', 'New Wave II', '599.00', '2'),
(3, 'MONITOR 23', 'LG HD MASTER II', '799.00', '3'),
(4, 'Mouse', 'Gamer', '99.00', '1'),
(5, 'Teclado', 'Dell', '99.00', '3'),
(6, 'XIOMI 99', 'TOP', '9999.00', '1'),
(7, 'TENIS', 'NIKE N42', '299.00', '1'),
(8, 'Airpods', 'Apple', '2599.00', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valor` decimal(10,2) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_cliente`, `data`, `valor`, `id_vendedor`) VALUES
(1, 0, '2022-09-13 03:00:00', '1000.00', 44),
(2, 0, '2022-09-13 03:00:00', '1000.00', 44),
(3, 1, '2022-08-31 03:00:00', '1000.00', 3),
(4, 1, '2022-09-11 03:00:00', '21.00', 21),
(5, 1, '2022-09-11 03:00:00', '45.00', 45),
(6, 1, '2022-09-13 03:00:00', '67.00', 67),
(7, 1, '2022-09-13 03:00:00', '67.00', 67),
(8, 1, '2022-09-05 03:00:00', '6800.00', 68),
(9, 1, '2022-09-12 03:00:00', '7200.00', 69),
(10, 1, '0000-00-00 00:00:00', '0.00', 0),
(11, 1, '0000-00-00 00:00:00', '0.00', 0),
(12, 1, '0000-00-00 00:00:00', '0.00', 0),
(13, 1, '0000-00-00 00:00:00', '0.00', 0),
(14, 1, '0000-00-00 00:00:00', '0.00', 0),
(15, 1, '0000-00-00 00:00:00', '0.00', 0),
(16, 1, '0000-00-00 00:00:00', '0.00', 0),
(17, 1, '0000-00-00 00:00:00', '0.00', 0),
(18, 1, '0000-00-00 00:00:00', '0.00', 0),
(19, 0, '2022-09-13 03:00:00', '2100.00', 1),
(20, 15, '2022-09-12 03:00:00', '99.00', 1),
(21, 15, '2022-09-12 03:00:00', '99.00', 1),
(22, 6, '2022-09-12 03:00:00', '99.00', 1),
(23, 14, '2022-09-19 03:00:00', '297.00', 12),
(24, 6, '2022-09-19 03:00:00', '4497.00', 2),
(25, 13, '2022-09-19 03:00:00', '1198.00', 2),
(26, 16, '2022-09-19 03:00:00', '5996.00', 2),
(27, 15, '2022-09-22 03:00:00', '1188.00', 2),
(28, 7, '2022-09-22 03:00:00', '297.00', 1),
(29, 6, '2022-09-29 03:00:00', '2998.00', 1),
(30, 14, '2022-10-03 03:00:00', '2998.00', 1),
(31, 5, '2022-10-21 03:00:00', '2397.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nome`) VALUES
(1, 'joao'),
(2, 'Thiago');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_prod` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
