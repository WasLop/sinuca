-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Mar-2021 às 22:21
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `snooker`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `championship`
--

CREATE TABLE `championship` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `rules` varchar(1000) NOT NULL,
  `ward` varchar(32) NOT NULL,
  `max_point` int(11) NOT NULL,
  `init_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `championship`
--

INSERT INTO `championship` (`id`, `name`, `rules`, `ward`, `max_point`, `init_date`, `end_date`) VALUES
(1, 'Primeira Liga 2017', 'Campeonato pontos corridos, Cada vitoria vale 10 pontos, o primeiro time a atingir 500 pontos vence, critério de desenpate será numero de vitórias caso continue empatado tera uma partida para desempatar', '', 500, '2017-02-10', NULL),
(2, 'Campeonato 2018', 'Campeonato de pontos corridos, cada vitoria vale 10 pontos, quem chegar primeiro aos 1000 pontos vence, numero de vitorias é criterio de desempate caso permaneça empatado sera realizado uma nova partida', '', 1000, '2018-02-10', NULL),
(3, 'Teste', 'teste regra', '100,00', 50000, '2021-03-04', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `id_championship` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `player1_name` varchar(100) NOT NULL,
  `player2_name` varchar(100) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table for create snooker team';

--
-- Extraindo dados da tabela `teams`
--

INSERT INTO `teams` (`id`, `id_championship`, `name`, `player1_name`, `player2_name`, `points`) VALUES
(2, 1, 'Snookers pr', 'Joaquim', 'Joana', 0),
(3, 3, 'time teste', 'primeiro teste', 'segundo teste', 0),
(4, 3, 'coração', 'João', 'Maria', 0),
(5, 3, 'Sinuqueiros', 'Washington', 'Ronaldo', 0),
(6, 2, 'Sinuqueiros 2', 'João', 'Ronaldo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `phone_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_pass`, `phone_number`) VALUES
(1, 'ADM', 'adm@services.com.br', 'ac3603b44e4942e697ec3a6525e91ced', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `championship`
--
ALTER TABLE `championship`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `championship`
--
ALTER TABLE `championship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
