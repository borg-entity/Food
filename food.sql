-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Out-2023 às 05:56
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `food`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2023-03-14-201026', 'App\\Database\\Migrations\\CriaTabelaUsuarios', 'default', 'App', 1678827905, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `ativo` tinyint(1) NOT NULL DEFAULT 0,
  `password_hash` varchar(255) NOT NULL,
  `ativacao_hash` varchar(64) DEFAULT NULL,
  `reset_hash` varchar(64) DEFAULT NULL,
  `reset_expira_em` datetime DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `is_admin`, `ativo`, `password_hash`, `ativacao_hash`, `reset_hash`, `reset_expira_em`, `criado_em`, `atualizado_em`, `deletado_em`) VALUES
(1, 'Lucio Antonio de Souza', 'admin@admin.com', '349.957.910-35', '(41) 9999-9999', 1, 1, '$2y$10$ggaKYKanaDLQivp2IuXkgO72rNtCcFUWVR9lL/QllyTpO4WhsG4uO', NULL, NULL, NULL, '2023-04-10 00:24:02', '2023-06-14 14:20:38', NULL),
(5, 'Fula de de tal', 'fulanow@email.com', '245.251.958-86', '(11) 14651-6565', 0, 1, '$2y$10$x.3Lwve6x2Y8yCmNxOHOSOH0D2MXBn.bgy8kPmsv/UQXEqxxfW.eC', NULL, NULL, NULL, '2023-05-14 04:20:32', '2023-07-03 20:14:43', NULL),
(4, 'Joao do Pulo', 'joao@email.com', '851.254.288-84', '(15) 15616-1616', 0, 1, '$2y$10$f6wTr6O5itsM7lg0n53rdeAPqhTlcxfg0IFsbqkp7atpYoxbmFf42', NULL, NULL, NULL, '2023-05-14 02:52:46', '2023-05-14 02:52:46', NULL),
(3, 'Maria Mariazinha dos contos de fada', 'maria@email.com', '607.231.688-30', '(11) 5649-9696', 1, 1, '$2y$10$8PEfgtsptGC2STlZiL11IuKz1U4qge4xpm8N8LzJqmmKk1pzRm96i', NULL, NULL, NULL, '2023-05-13 20:51:02', '2023-06-02 06:01:48', NULL),
(6, 'Ultra Seven', 'utmebius@gmail.com', '415.314.048-12', '1198765432', 1, 1, '$2y$10$WPQA2ZSkqM05Ufz2gUpdQu5BgS/jTBsW/LtLr3FdL29s5o0cLhu16', NULL, NULL, NULL, '2023-10-01 23:25:52', '2023-10-03 23:31:52', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `ativacao_hash` (`ativacao_hash`),
  ADD UNIQUE KEY `reset_hash` (`reset_hash`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
