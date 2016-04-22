-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 21 Avril 2016 à 12:07
-- Version du serveur :  5.5.41-log
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `archives`
--

CREATE TABLE IF NOT EXISTS `archives` (
`id` int(11) NOT NULL,
  `query` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL,
  `users_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `archives`
--

INSERT INTO `archives` (`id`, `query`, `answer`, `users_id`, `created`) VALUES
(11, 'message1', 'message2', 10, '2016-04-08 12:33:16');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Cat1'),
(2, 'Cat2'),
(3, 'Cat3');

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
`id` int(11) NOT NULL,
  `contenu` mediumtext NOT NULL,
  `created` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `chats`
--

INSERT INTO `chats` (`id`, `contenu`, `created`, `users_id`, `rooms_id`) VALUES
(1, 'message1', '2016-04-02 20:34:53', 10, 1),
(3, 'message2', '2016-04-08 12:01:28', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contenu` mediumtext,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`) VALUES
(1, 'amin', '2016-02-11 00:00:00'),
(2, 'utilisateur', '2016-02-11 00:00:00'),
(3, 'premium', '2016-03-13 00:00:00'),
(4, 'bénévole', '2016-04-11 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
`id` int(10) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(19, 'fra', 'Posts', 18, 'title', 'Titre en français'),
(20, 'eng', 'Posts', 18, 'title', 'Titre en anglais'),
(25, 'fra', 'Posts', 18, 'contenu', 'Contenu en français'),
(26, 'eng', 'Posts', 18, 'contenu', 'Contenu en anglais'),
(27, 'fra', 'Posts', 19, 'title', 'Titre en français'),
(28, 'eng', 'Posts', 19, 'title', 'Titre en anglais'),
(29, 'fra', 'Posts', 19, 'contenu', 'Contenu en français'),
(30, 'eng', 'Posts', 19, 'contenu', 'Contenu en anglais'),
(31, 'fra', 'Posts', 20, 'title', 'Titre en français'),
(32, 'eng', 'Posts', 20, 'title', 'Titre en anglais'),
(33, 'fra', 'Posts', 20, 'contenu', 'Contenu en français'),
(34, 'eng', 'Posts', 20, 'contenu', 'Contenu en anglais'),
(35, 'fra', 'Posts', 21, 'title', 'Titre en français'),
(36, 'eng', 'Posts', 21, 'title', 'Titre en anglais'),
(37, 'fra', 'Posts', 21, 'contenu', 'Contenu en français'),
(38, 'eng', 'Posts', 21, 'contenu', 'Contenu en anglais'),
(39, 'fra', 'Posts', 22, 'title', 'Titre en français'),
(40, 'eng', 'Posts', 22, 'title', 'Titre en anglais'),
(41, 'fra', 'Posts', 22, 'contenu', 'Contenu en français'),
(42, 'eng', 'Posts', 22, 'contenu', 'Contenu en anglais'),
(43, 'fra', 'Posts', 23, 'title', 'Titre en français'),
(44, 'eng', 'Posts', 23, 'title', 'Titre en anglais'),
(45, 'fra', 'Posts', 23, 'contenu', 'Contenu en français'),
(46, 'eng', 'Posts', 23, 'contenu', 'Contenu en anglais'),

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`) VALUES
(2, 'aze1.aze@gmail.com'),
(4, 'aze2.aze@gmail.com'),
(5, 'aze3.aze@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` int(1) DEFAULT '0',
  `contenu` longtext,
  `date_post` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `contenu`, `date_post`, `users_id`, `categories_id`) VALUES
(18, 'Titre en français', 1, 'Contenu en français', '2016-04-08 22:40:00', 10, 3),
(19, 'Titre en français', 1, 'Contenu en français', '2016-04-08 23:04:00', 10, 3),
(20, 'Titre en français', 1, 'Contenu en français', '2016-04-08 23:09:00', 10, 3),
(21, 'Titre en français', 1, 'Contenu en français', '2016-04-08 23:13:00', 10, 3),
(22, 'Titre en français', 1, 'Contenu en français', '2016-04-08 23:32:00', 10, 1),
(23, 'Titre en français', 1, 'Contenu en français', '2016-04-08 23:49:00', 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nb_users` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `nb_users`) VALUES
(1, 'Générale', 0),
(2, 'Room1', 0),
(3, 'Room2', 0),
(4, 'Room3', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `end_subscription` datetime DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `groups_id` int(11) DEFAULT '2',
  `newsletter_id` int(11) DEFAULT NULL,
  `avatar` int(1) DEFAULT '0',
  `rooms_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `active`, `token`, `end_subscription`, `mail`, `groups_id`, `newsletter_id`, `avatar`, `rooms_id`) VALUES
(10, 'user1', '701c5fc2079bc159ace8a2325928ed2a70074306', '2016-02-17 13:50:33', 1, '', NULL, 'aze2.aze@gmail.com', 1, 4, 1, 0),
(12, 'user2', '701c5fc2079bc159ace8a2325928ed2a70074306', '2016-04-10 12:26:06', 1, '', '2016-05-10 13:24:00', 'aze3.aze@gmail.com', 3, 5, 1, 0),
(13, 'user3', '701c5fc2079bc159ace8a2325928ed2a70074306', '2016-04-11 11:23:29', 1, '', '2035-04-11 12:17:00', 'aze1.aze@gmail.com', 4, NULL, 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `archives`
--
ALTER TABLE `archives`
 ADD PRIMARY KEY (`id`), ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chats`
--
ALTER TABLE `chats`
 ADD PRIMARY KEY (`id`), ADD KEY `users_id` (`users_id`), ADD KEY `rooms_id` (`rooms_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_COMMENTS_id` (`post_id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
 ADD PRIMARY KEY (`id`), ADD KEY `locale` (`locale`), ADD KEY `model` (`model`), ADD KEY `row_id` (`foreign_key`), ADD KEY `field` (`field`);

--
-- Index pour la table `newsletters`
--
ALTER TABLE `newsletters`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_POSTS_users_id` (`users_id`), ADD KEY `FK_POSTS_categories_id` (`categories_id`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_USERS_groups_id` (`groups_id`), ADD KEY `FK_USERS_newsletter_id` (`newsletter_id`), ADD KEY `rooms_id` (`rooms_id`), ADD KEY `groups_id` (`groups_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `archives`
--
ALTER TABLE `archives`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `chats`
--
ALTER TABLE `chats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `newsletters`
--
ALTER TABLE `newsletters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `FK_COMMENTS_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `FK_POSTS_categories_id` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
ADD CONSTRAINT `FK_POSTS_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `FK_USERS_groups_id` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`),
ADD CONSTRAINT `FK_USERS_newsletter_id` FOREIGN KEY (`newsletter_id`) REFERENCES `newsletters` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
