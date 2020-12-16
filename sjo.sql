CREATE DATABASE sjo;

USE sjo;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sjo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `id_user_face` varchar(90) DEFAULT NULL,
  `valor` int(4) DEFAULT NULL,
  `prot` varchar(15) DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` int(1) NOT NULL DEFAULT '1',
  `email` varchar(100) DEFAULT NULL,
  `url_foto` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `nome`, `id_user_face`, `valor`, `prot`, `atualizado_em`, `ativo`, `email`, `url_foto`) VALUES
(189, 'Teste', '769111126786452', 190, '20190330112911', '2019-04-01 02:48:11', 1, 'teste@teste.com', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=769111126786452&height=50&width=50&ext=1516548431&hash=AeQbluBgD9sDc_P2'),
(190, 'Lucia Maria', '1575481499115282', 200, '20190331222428', '2019-04-01 01:24:28', 1, '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1575481499115282&height=50&width=50&ext=1556613861&hash=AeR0xvnBFcQs2p8q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
