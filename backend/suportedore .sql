-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2020 às 21:00
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `suportedore`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbespecifico`
--

CREATE TABLE `tbespecifico` (
  `idespecifico` int(11) NOT NULL,
  `noespecifico` varchar(50) NOT NULL,
  `idsubmodulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbespecifico`
--

INSERT INTO `tbespecifico` (`idespecifico`, `noespecifico`, `idsubmodulo`) VALUES
(1, 'Servidores', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbinformacoes`
--

CREATE TABLE `tbinformacoes` (
  `idinformacao` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `idsetor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbinformacoes`
--

INSERT INTO `tbinformacoes` (`idinformacao`, `descricao`, `idsetor`) VALUES
(1, 'Aviso aos navegantes...', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitemfinal`
--

CREATE TABLE `tbitemfinal` (
  `iditemfinal` int(11) NOT NULL,
  `noitemfinal` varchar(50) NOT NULL,
  `idespecifico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbitemfinal`
--

INSERT INTO `tbitemfinal` (`iditemfinal`, `noitemfinal`, `idespecifico`) VALUES
(1, 'Memória', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmodulo`
--

CREATE TABLE `tbmodulo` (
  `idmodulo` int(11) NOT NULL,
  `nomodulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbmodulo`
--

INSERT INTO `tbmodulo` (`idmodulo`, `nomodulo`) VALUES
(1, 'Informática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmotivo`
--

CREATE TABLE `tbmotivo` (
  `idmotivo` int(11) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `idproblema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproblema`
--

CREATE TABLE `tbproblema` (
  `idproblema` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `idsubmodulo` int(11) NOT NULL,
  `idespecifico` int(11) NOT NULL,
  `iditemfinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbproblema`
--

INSERT INTO `tbproblema` (`idproblema`, `descricao`, `idsubmodulo`, `idespecifico`, `iditemfinal`) VALUES
(2, 'Instalação', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsetor`
--

CREATE TABLE `tbsetor` (
  `idsetor` int(11) NOT NULL,
  `nosetor` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbsetor`
--

INSERT INTO `tbsetor` (`idsetor`, `nosetor`) VALUES
(1, 'TI'),
(2, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsolucao`
--

CREATE TABLE `tbsolucao` (
  `idsolucao` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsubmodulo`
--

CREATE TABLE `tbsubmodulo` (
  `idsubmodulo` int(11) NOT NULL,
  `nosubmodulo` varchar(50) NOT NULL,
  `idmodulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbsubmodulo`
--

INSERT INTO `tbsubmodulo` (`idsubmodulo`, `nosubmodulo`, `idmodulo`) VALUES
(1, 'Hardware', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idusuario` int(11) NOT NULL,
  `nousuario` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `idsetor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idusuario`, `nousuario`, `email`, `senha`, `idsetor`) VALUES
(2, 'Eliano', 'eliano@dore.com.br', '12345', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usario_modulo`
--

CREATE TABLE `usario_modulo` (
  `idusuariomodulo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idmodulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbespecifico`
--
ALTER TABLE `tbespecifico`
  ADD PRIMARY KEY (`idespecifico`),
  ADD KEY `fk_nomeSubmodulo` (`idsubmodulo`);

--
-- Índices para tabela `tbinformacoes`
--
ALTER TABLE `tbinformacoes`
  ADD PRIMARY KEY (`idinformacao`),
  ADD KEY `fk_idsetor` (`idsetor`);

--
-- Índices para tabela `tbitemfinal`
--
ALTER TABLE `tbitemfinal`
  ADD PRIMARY KEY (`iditemfinal`),
  ADD KEY `fk_nomeEspecifico` (`idespecifico`);

--
-- Índices para tabela `tbmodulo`
--
ALTER TABLE `tbmodulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Índices para tabela `tbmotivo`
--
ALTER TABLE `tbmotivo`
  ADD PRIMARY KEY (`idmotivo`),
  ADD KEY `fk_idproblema` (`idproblema`);

--
-- Índices para tabela `tbproblema`
--
ALTER TABLE `tbproblema`
  ADD PRIMARY KEY (`idproblema`),
  ADD KEY `fk_nomeSubmoduloPro` (`idsubmodulo`),
  ADD KEY `fk_nomeEspecificoPro` (`idespecifico`),
  ADD KEY `fk_nomeItemfinalPro` (`iditemfinal`);

--
-- Índices para tabela `tbsetor`
--
ALTER TABLE `tbsetor`
  ADD PRIMARY KEY (`idsetor`);

--
-- Índices para tabela `tbsolucao`
--
ALTER TABLE `tbsolucao`
  ADD PRIMARY KEY (`idsolucao`);

--
-- Índices para tabela `tbsubmodulo`
--
ALTER TABLE `tbsubmodulo`
  ADD PRIMARY KEY (`idsubmodulo`),
  ADD KEY `fk_nomeModuloSub` (`idmodulo`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_nomeSetor` (`idsetor`);

--
-- Índices para tabela `usario_modulo`
--
ALTER TABLE `usario_modulo`
  ADD PRIMARY KEY (`idusuariomodulo`),
  ADD KEY `fk_nomeUsuario` (`idusuario`),
  ADD KEY `fk_nomeModulo` (`idmodulo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbespecifico`
--
ALTER TABLE `tbespecifico`
  MODIFY `idespecifico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbinformacoes`
--
ALTER TABLE `tbinformacoes`
  MODIFY `idinformacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbitemfinal`
--
ALTER TABLE `tbitemfinal`
  MODIFY `iditemfinal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbmodulo`
--
ALTER TABLE `tbmodulo`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbmotivo`
--
ALTER TABLE `tbmotivo`
  MODIFY `idmotivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbproblema`
--
ALTER TABLE `tbproblema`
  MODIFY `idproblema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbsetor`
--
ALTER TABLE `tbsetor`
  MODIFY `idsetor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbsolucao`
--
ALTER TABLE `tbsolucao`
  MODIFY `idsolucao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbsubmodulo`
--
ALTER TABLE `tbsubmodulo`
  MODIFY `idsubmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usario_modulo`
--
ALTER TABLE `usario_modulo`
  MODIFY `idusuariomodulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbespecifico`
--
ALTER TABLE `tbespecifico`
  ADD CONSTRAINT `fk_nomeSubmodulo` FOREIGN KEY (`idsubmodulo`) REFERENCES `tbsubmodulo` (`idsubmodulo`);

--
-- Limitadores para a tabela `tbinformacoes`
--
ALTER TABLE `tbinformacoes`
  ADD CONSTRAINT `fk_idsetor` FOREIGN KEY (`idsetor`) REFERENCES `tbsetor` (`idsetor`);

--
-- Limitadores para a tabela `tbitemfinal`
--
ALTER TABLE `tbitemfinal`
  ADD CONSTRAINT `fk_nomeEspecifico` FOREIGN KEY (`idespecifico`) REFERENCES `tbespecifico` (`idespecifico`);

--
-- Limitadores para a tabela `tbmotivo`
--
ALTER TABLE `tbmotivo`
  ADD CONSTRAINT `fk_idproblema` FOREIGN KEY (`idproblema`) REFERENCES `tbproblema` (`idproblema`);

--
-- Limitadores para a tabela `tbproblema`
--
ALTER TABLE `tbproblema`
  ADD CONSTRAINT `fk_nomeEspecificoPro` FOREIGN KEY (`idespecifico`) REFERENCES `tbespecifico` (`idespecifico`),
  ADD CONSTRAINT `fk_nomeItemfinalPro` FOREIGN KEY (`iditemfinal`) REFERENCES `tbitemfinal` (`iditemfinal`),
  ADD CONSTRAINT `fk_nomeSubmoduloPro` FOREIGN KEY (`idsubmodulo`) REFERENCES `tbsubmodulo` (`idsubmodulo`);

--
-- Limitadores para a tabela `tbsubmodulo`
--
ALTER TABLE `tbsubmodulo`
  ADD CONSTRAINT `fk_nomeModuloSub` FOREIGN KEY (`idmodulo`) REFERENCES `tbmodulo` (`idmodulo`);

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `fk_nomeSetor` FOREIGN KEY (`idsetor`) REFERENCES `tbsetor` (`idsetor`);

--
-- Limitadores para a tabela `usario_modulo`
--
ALTER TABLE `usario_modulo`
  ADD CONSTRAINT `fk_nomeModulo` FOREIGN KEY (`idmodulo`) REFERENCES `tbmodulo` (`idmodulo`),
  ADD CONSTRAINT `fk_nomeUsuario` FOREIGN KEY (`idusuario`) REFERENCES `tbusuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
