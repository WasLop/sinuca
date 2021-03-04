-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Mar-2021 às 05:11
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
  `status` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `championship`
--

INSERT INTO `championship` (`id`, `name`, `rules`, `ward`, `max_point`, `init_date`, `status`) VALUES
(5, 'Sinuca 2019', 'Campeonato pontos corridos; Máximo de 10 times; Cada jogo ganho vale 10 pontos; O primeiro a Chegar nos 100 pontos ganha', 'R$ 1000,00', 100, '2019-02-20', 'ENCERRADO'),
(6, 'Sinuca 2020', 'Campeonato pontos corridos; Máximo de 10 times; Cada jogo ganho vale 10 pontos; O primeiro a Chegar nos 100 pontos ganha', 'R$ 1000,00', 100, '2020-02-20', 'EM ANDAMENTO'),
(7, 'Sinuca 2021', 'Campeonato pontos corridos; Máximo de 10 times; Cada jogo ganho vale 10 pontos; O primeiro a Chegar nos 100 pontos ganha', 'R$ 1000,00', 100, '2021-02-20', 'EM ANDAMENTO');

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
  `victories` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `champion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table for create snooker team';

--
-- Extraindo dados da tabela `teams`
--

INSERT INTO `teams` (`id`, `id_championship`, `name`, `player1_name`, `player2_name`, `victories`, `points`, `champion`) VALUES
(13, 5, 'Atlético Paranaense', 'João', 'Joana', 10, 100, 1),
(14, 5, 'Botafogo', 'Serginho', 'Edson', 4, 40, 0),
(15, 5, 'Vasco da Gama', 'Everton', 'Thomas', 2, 20, 0),
(16, 5, 'Corinthians', 'Michael', 'Jackson', 2, 20, 0),
(17, 5, 'Coritiba', 'Rubens', 'Tonho', 2, 20, 0),
(18, 5, 'Cruzeiro', 'Gino ', 'Geno', 2, 20, 0),
(19, 5, 'Atlético Mineiro', 'Romario', 'Ronaldo', 2, 20, 0),
(20, 5, 'Flamengo', 'Gilson', 'Ana', 2, 20, 0),
(21, 5, 'Gremio', 'Ronaldo', 'Romanolo', 3, 30, 0),
(22, 5, 'Sinuqueiros', 'Washington', 'Wellington', 5, 50, 0),
(23, 6, 'Atlético Paranaense', 'João', 'Joana', 0, 0, 0),
(24, 6, 'Botafogo', 'Serginho', 'Edson', 0, 0, 0),
(25, 6, 'Vasco da Gama', 'Everton', 'Thomas', 0, 0, 0),
(26, 6, 'Corinthians', 'Michael', 'Jackson', 0, 0, 0),
(27, 6, 'Coritiba', 'Rubens', 'Tonho', 0, 0, 0),
(28, 6, 'Cruzeiro', 'Tunico', 'Tinoco', 0, 0, 0),
(29, 6, 'Ponte Preta', 'Gino', 'Geno', 0, 0, 0),
(30, 6, 'Atlético Mineiro', 'Romario', 'Ronaldo', 0, 0, 0),
(31, 6, 'Flamengo', 'Gilson', 'Ana', 0, 0, 0),
(32, 6, 'Gremio', 'Ronaldo', 'Romanolo', 0, 0, 0),
(33, 7, 'Atlético Paranaense', 'João', 'Joana', 0, 0, 0),
(34, 7, 'Sinuqueiros', 'Washington', 'Wellington', 0, 0, 0),
(35, 7, 'Ponte Preta', 'Gino', 'Geno', 0, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
