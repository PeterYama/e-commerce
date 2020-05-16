-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2020 às 17:20
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `e_commerce_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabproduct`
--

CREATE TABLE `tabproduct` (
  `P_ID` int(11) NOT NULL,
  `P_Category` varchar(15) DEFAULT NULL,
  `P_Description` text DEFAULT NULL,
  `P_Image` varchar(300) DEFAULT NULL,
  `P_Name` varchar(100) NOT NULL,
  `P_Price` decimal(10,0) NOT NULL,
  `P_Rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabproduct`
--

INSERT INTO `tabproduct` (`P_ID`, `P_Category`, `P_Description`, `P_Image`, `P_Name`, `P_Price`, `P_Rating`) VALUES
(1, 'RPG', 'ELDEN RING is FromSoftware’s largest game to-date and is set in a sprawling realm steeped in a rich and bloody history crafted by Hidetaka Miyazaki – creator of the influential and critically acclaimed DARK SOULS video game series; and George R.R. Martin – author of The New York Times best-selling fantasy series, A Song of Ice and Fire.', '0', 'Elden Ring', '89', 5),
(2, 'Adventure', 'From Santa Monica Studio and creative director Cory Barlog comes a new beginning for one of gaming\'s most recognizable icons. Living as a man outside the shadow of the gods, Kratos must adapt to unfamiliar lands, unexpected threats, and a second chance at being a father. Together with his son Atreus, the pair will venture into the brutal Norse wilds and fight to fulfill a deeply personal quest.', '1', 'God of War', '80', 5),
(3, 'Adventure', 'Ghost of Tsushima is an action-adventure stealth game. Played from a third-person perspective, it features a large open world without any waypoints and can be explored without guidance. Players can travel to different parts of the game\'s world quickly by riding a horse.', '2', 'Ghost of Tsukushima', '85', 4),
(4, 'FPS', 'People Can Fly is striking out into the unknown with a new IP in the form of a spacefaring shooter known as Outriders. This Square Enix published title is headed to next-gen consoles and blends together a few genres. It’s a peculiar three-player co-op looter shooter with a distinct focus on storytelling and gunplay.', '3', 'Outriders', '70', 4),
(5, 'RPG', 'Cyberpunk 2077. Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality. Sep 16, 2020. CD PROJEKT RED.', '4', 'Cyber Punk 2077', '85', 5),
(6, 'Horror', 'The last great human settlement exists within an unforgiving, infected world, plunged into a modern dark age. During the day, bandits, factions and starving survivors roam the streets scavenging for scraps - or someone to take them from, by violence if necessary. At night the infected roam free, evacuating their dark hideouts to prey on the living.', '5', 'Dying Light 2', '87', 4),
(7, 'FPS', 'Predator: Hunting Grounds is an immersive asymmetrical shooter set in remote areas, where the Predator stalks the most challenging prey. Play as a member of an elite Fireteam and complete paramilitary operations before the Predator finds you. Or, play as the Predator to hunt the most worthy prey, choosing from your vast array of deadly alien tech to collect your trophies, one by one.', '6', 'Predator Hunting Grounds', '70', 0),
(8, 'RPG', 'In the sprawling city of Midgar, an anti-Shinra organization calling themselves Avalanche have stepped up their resistance. Cloud Strife, a former member of Shinra’s elite SOLDIER unit now turned mercenary, lends his aid to the group, unaware of the epic consequences that await him.', '7', 'FINAL FANTASY VII REMAKE', '80', 5),
(9, 'Horror', 'The British Institute of Archaeology, London, 1908: The disappearance of an esteemed Egyptologist prompts a Police investigation into the unknown. Explore cryptic locations, examine fantastic gadgets and enter an otherworldly space which blurs the line between reality and illusion. Designed from the ground up for the unique capabilities of virtual reality, players can inhabit the spine-tingling world of The Room and interact with its strange contraptions in this compelling new chapter.', '8', 'The Room VR: A Dark Matter', '70', 4),
(10, 'Adventure', 'Paper Beast is a playful exploration game set in a colorful ecosystem born out of big data. Undertake a virtual journey of discovery through an immersive and poetic gameplay experience.', '9', 'Paper Beast', '88', 5),
(12, 'FPS', 'Experience the ultimate combination of speed and power as you rip-and-tear your way across dimensions with the next leap in push-forward, first-person combat.', '10', 'DOOM Eternal', '89', 5),
(13, 'Horror', 'Five years after their dangerous journey across the post-pandemic United States, Ellie and Joel have settled down in Jackson, Wyoming. Living amongst a thriving community of survivors has allowed them peace and stability, despite the constant threat of the infected and other, more desperate survivors.', '11', 'THE LAST OF US PART ll', '80', 5),
(14, 'Sport', 'MLB® The Show™ 20 is what baseball dreams are made of. With new ways to play, greater customization, and more exciting new paths to rake in rewards — this is the biggest and best Show ever. Write your own baseball legacy in an expansive RPG experience, or build and manage the team of your dreams to face intense online competition*. The Show 20 is your ticket to play America’s pastime your way.', '12', 'MLB® The Show™ 20', '80', 5),
(15, 'Adventure', 'Master the lethal arts of the samurai as a mysterious half-human, half-supernatural Yokai warrior, in this challenging action RPG sequel.', '13', 'Nioh 2', '75', 4),
(16, 'Adventure', 'Become Eivor, a legendary Viking raider on a quest for glory on Xbox One and Xbox Series X. Sail from the harsh shores of Norway to the beautiful but forbidding kingdoms of England. Write Your Viking Saga. Grow Your Settlement. Lead Epic Raids. A Dark Age Open World.', '14', 'Ads\r\n\r\nAssassin\'s Creed Valhalla', '86', 4),
(17, 'Adventure', 'Sam, a 33-year old man recovering from a recent break-up, returns to his hometown Basswood, West Virginia, for the funeral of his best friend. Understandably depressed and bitter, he feels completely out of sorts and out of place… But when he wakes up in his hotel room with a bloody shirt and no memory of his whereabouts the previous night, he embarks on a twisted investigation to find the truth.', '15', 'Twin Mirror', '70', 5),
(18, 'Strategy', '1971 Project Helios is a turn-based strategy game which combines modern warfare military tactics and close combat. Firearms and vehicles are scarce, conflicts and hostilities have no end, and the terrible freezing cold annihilates friends and foes in its path.', '16', '1971 Project Helios', '66', 5),
(19, 'RPG', 'A novice stage performer who joined the Flower Division to follow in the footsteps of her idol, onetime mega-star Sakura Shinguji. She believes strongly in the importance of both sides of the organization: the combat unit that defends Tokyo and its dramatic counterpart, the Imperial Revue, that lifts the spirits of the populace. Sakura fervently prays that both will eventually be restored to their former glory.', '17', 'Sakura Wars', '70', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabreview`
--

CREATE TABLE `tabreview` (
  `R_ID` int(11) NOT NULL,
  `P_ID` int(11) DEFAULT NULL,
  `R_Stars` int(1) DEFAULT NULL,
  `R_Text` varchar(300) DEFAULT NULL,
  `R_UserName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Password` varchar(150) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `SecretQuestionID` int(3) NOT NULL,
  `SecretQuestionAnswer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `Email`, `FirstName`, `LastName`, `Password`, `Gender`, `Phone`, `SecretQuestionID`, `SecretQuestionAnswer`) VALUES
(4, 'peter@email.com', NULL, NULL, '$2y$10$it1AjwSywE6hSMysZYaiDe8.Thx7rmv1alQ7mvuy7..S3BBgRFBXm', '', '', 0, ''),
(14, 'peter@email.coma', 'Peter', 'Yamamoto', '$2y$10$CIJ6RdiB1dwVyVQ8njAWdeKjBxJ48TNqBx7QVffN4K7APsEmcf3qa', 'male', '0405944748', 1, 'Today'),
(15, 'newuser@new.com', 'Peter', 'Yamamoto', '$2y$10$esS7xz8qpH0aJQU3OtASyO7ilQ18XXbrYH8c9HcObbIxFyhTlnMKK', 'male', '0405944748', 1, 'yesterday'),
(16, 'peter@email.comqwe', 'Peter', 'Yamamoto', '$2y$10$30JPAS.Rk1b7fdcAU/CFgeSKjb87nGYmXeXUPryC0WR8hFdICf7PO', 'male', '0405944748', 1, 'yesterday'),
(17, 'peter@email.com1232', 'Peter', 'Yamamoto', '$2y$10$mNy7hVs.4ffigpr4HPNYpu7NLk8DdvocLUm9bjetLzixb3w2fvp1C', 'female', '0405944748', 1, 'Today');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tabproduct`
--
ALTER TABLE `tabproduct`
  ADD PRIMARY KEY (`P_ID`);

--
-- Índices para tabela `tabreview`
--
ALTER TABLE `tabreview`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `P_ID` (`P_ID`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tabproduct`
--
ALTER TABLE `tabproduct`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tabreview`
--
ALTER TABLE `tabreview`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
