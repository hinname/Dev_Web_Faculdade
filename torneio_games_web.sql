-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2020 às 01:37
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `torneio_games_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `confrontos`
--

CREATE TABLE `confrontos` (
  `id` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `posicao` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `id_torneio` int(11) NOT NULL,
  `id_user_winner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desenvolvedora`
--

CREATE TABLE `desenvolvedora` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_func` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `desenvolvedora`
--

INSERT INTO `desenvolvedora` (`id`, `nome`, `id_func`) VALUES
(1, 'Capcom', 1),
(2, 'Riot Games', 1),
(3, 'Electronic Arts', 1),
(4, 'Blizzard', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Herivelton Borges da Costa', 'herivelton.PRo@gmail.com', 'servidor'),
(2, 'SUPORTE MASTER', 'suporte@suporte.com', 'servido'),
(3, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_dev` int(11) NOT NULL,
  `id_func` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `nome`, `id_dev`, `id_func`) VALUES
(1, 'Street Fighter V', 1, 1),
(2, 'League of Legends', 2, 1),
(3, 'Hearthstone', 4, 1),
(4, 'Fifa', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `torneios`
--

CREATE TABLE `torneios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `num_players` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_termino` date NOT NULL,
  `id_jogo` int(11) NOT NULL,
  `id_func` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `torneios`
--

INSERT INTO `torneios` (`id`, `nome`, `num_players`, `data_inicio`, `data_termino`, `id_jogo`, `id_func`) VALUES
(1, 'Torneio de Street Fighter V', 16, '2020-11-25', '2020-11-26', 1, 1),
(2, 'Torneio de League of Legends', 16, '2020-12-01', '2020-12-01', 2, 1),
(3, 'Torneio de Fifa', 16, '2020-12-09', '2020-12-09', 4, 1),
(4, 'Torneio de Hearthstone', 16, '2020-12-10', '2020-12-10', 3, 1),
(6, 'SuperWeekend Street Fighter V', 16, '2020-11-28', '2020-11-29', 1, 1),
(7, 'SuperWeekend League of Legends', 16, '2020-12-05', '2020-12-05', 2, 1),
(8, 'SuperWeekend Fifa', 16, '2020-12-12', '2020-12-12', 4, 1),
(9, 'SuperWeekend Hearthstone', 16, '2020-12-19', '2020-12-19', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `sexo`, `telefone`, `data_nasc`) VALUES
(1, 'Jose Souza Marques', 'souza.marques@hotmail.com', 'marques', 'M', '(21) 99999-9999', '2000-02-05'),
(2, 'Lucas Machado', 'lucas.machado@gmail.com', 'lucas', 'M', '(21) 99999-9999', '1999-12-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_confronto`
--

CREATE TABLE `usuario_confronto` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_confronto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_torneio`
--

CREATE TABLE `usuario_torneio` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_torneio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `confrontos`
--
ALTER TABLE `confrontos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_torneio` (`id_torneio`),
  ADD KEY `id_user_winner` (`id_user_winner`);

--
-- Índices para tabela `desenvolvedora`
--
ALTER TABLE `desenvolvedora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_func` (`id_func`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dev` (`id_dev`),
  ADD KEY `id_func` (`id_func`);

--
-- Índices para tabela `torneios`
--
ALTER TABLE `torneios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jogo` (`id_jogo`),
  ADD KEY `id_func` (`id_func`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario_confronto`
--
ALTER TABLE `usuario_confronto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_confronto` (`id_confronto`);

--
-- Índices para tabela `usuario_torneio`
--
ALTER TABLE `usuario_torneio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_torneio` (`id_torneio`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `confrontos`
--
ALTER TABLE `confrontos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `desenvolvedora`
--
ALTER TABLE `desenvolvedora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `torneios`
--
ALTER TABLE `torneios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario_confronto`
--
ALTER TABLE `usuario_confronto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario_torneio`
--
ALTER TABLE `usuario_torneio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `confrontos`
--
ALTER TABLE `confrontos`
  ADD CONSTRAINT `confrontos_ibfk_1` FOREIGN KEY (`id_torneio`) REFERENCES `torneios` (`id`),
  ADD CONSTRAINT `confrontos_ibfk_2` FOREIGN KEY (`id_user_winner`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `desenvolvedora`
--
ALTER TABLE `desenvolvedora`
  ADD CONSTRAINT `desenvolvedora_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id`);

--
-- Limitadores para a tabela `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `jogos_ibfk_1` FOREIGN KEY (`id_dev`) REFERENCES `desenvolvedora` (`id`),
  ADD CONSTRAINT `jogos_ibfk_2` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id`);

--
-- Limitadores para a tabela `torneios`
--
ALTER TABLE `torneios`
  ADD CONSTRAINT `torneios_ibfk_1` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id`),
  ADD CONSTRAINT `torneios_ibfk_2` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id`);

--
-- Limitadores para a tabela `usuario_confronto`
--
ALTER TABLE `usuario_confronto`
  ADD CONSTRAINT `usuario_confronto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `usuario_confronto_ibfk_2` FOREIGN KEY (`id_confronto`) REFERENCES `confrontos` (`id`);

--
-- Limitadores para a tabela `usuario_torneio`
--
ALTER TABLE `usuario_torneio`
  ADD CONSTRAINT `usuario_torneio_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `usuario_torneio_ibfk_2` FOREIGN KEY (`id_torneio`) REFERENCES `torneios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
