-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Ven 11 Mars 2016 à 09:47
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
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Programmation C'),
(2, 'Programmation Java');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `chats`
--

INSERT INTO `chats` (`id`, `contenu`, `created`, `users_id`, `rooms_id`) VALUES
(1, 'salut est-ce que ça marche ?', '2016-03-08 11:29:58', 10, 1),
(2, 'ça marche !!', '2016-03-08 11:30:11', 10, 1),
(3, 'test 1', '2016-03-10 13:30:26', 10, 1),
(4, 'test 2', '2016-03-10 13:30:33', 10, 1),
(5, 'test 3', '2016-03-10 13:30:39', 10, 1),
(6, '42 !', '2016-03-10 13:30:46', 10, 1),
(7, 'salut ça va scroll down', '2016-03-10 13:31:00', 10, 1),
(8, 'non pas du tout je susi un gfrio', '2016-03-10 13:31:12', 10, 1),
(9, 'non je suis un gros connard quio scroll down en refreshant la page c''est degeulasse ', '2016-03-10 13:31:43', 10, 1),
(10, 'tgtegtegte', '2016-03-10 13:34:47', 10, 1),
(11, 'vrezvae', '2016-03-10 13:34:51', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contenu` mediumtext,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `contenu`, `post_id`) VALUES
(1, 1, 'genial', 1),
(2, 10, 'test rapide\r\n', 4);

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`) VALUES
(1, 'amin', '2016-02-11 00:00:00'),
(2, 'utilisateur', '2016-02-11 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `newsletters`
--

INSERT INTO `newsletters` (`email`) VALUES
('aze@aze.aze'),
('aze@aze.azeaze'),
('aze@aze.azer');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `contenu`, `date_post`, `users_id`, `categories_id`) VALUES
(1, 'Premier tuto', 0, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2016-02-11 00:00:00', 1, 1),
(2, 'Test crash', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-02-14 00:00:00', 1, 1),
(3, 'Injection SQL', 0, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', '2016-02-15 00:00:00', 1, 1),
(4, 'Test pagination', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-02-21 00:00:00', 1, 1),
(5, 'Test image', 1, 'Look cette image !', '2016-03-10 12:40:00', 10, 1),
(6, 'Test retour à la ligne', 1, 'test\r\ntest\r\ntest', '2016-03-10 15:17:00', 10, 1),
(7, 'article avec image 1', 1, 'ça marche pas ça ! ', '2016-03-10 15:23:00', 10, 2),
(8, 'article avec image 2', 1, 'ça marche pas ça', '2016-03-10 15:24:00', 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nb_users` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `nb_users`) VALUES
(1, 'Général', 17),
(2, 'Programmation en C', 0),
(3, 'Programmation en Java', 0);

-- --------------------------------------------------------

--
-- Structure de la table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
`id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `subscription`
--

INSERT INTO `subscription` (`id`, `price`, `tax`, `txnid`, `amount`, `created`, `user_id`) VALUES
(1, 8.33, 1.2, 'paiement', 9, '2016-02-11 00:00:00', 1);

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
  `subscription_id` int(11) DEFAULT NULL,
  `newsletter_id` varchar(255) DEFAULT NULL,
  `avatar` int(1) DEFAULT '0',
  `rooms_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `active`, `token`, `end_subscription`, `mail`, `groups_id`, `subscription_id`, `newsletter_id`, `avatar`, `rooms_id`) VALUES
(1, 'GrandManitout', 'root', '2016-02-11 00:00:00', 1, NULL, '5000-01-01 00:00:00', 'aze.aze@aze.fr', 1, 1, NULL, 0, 0),
(10, 'nicolas', '032aae5b4d713fd227e660ceda4edc5299cb3f09', '2016-02-17 13:50:33', 1, '', '2016-02-18 00:00:00', 'nicolas.grellety@gmail.com', 1, NULL, 'aze@aze.azer', 1, 0);

--
-- Index pour les tables exportées
--

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
-- Index pour la table `newsletters`
--
ALTER TABLE `newsletters`
 ADD PRIMARY KEY (`email`);

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
-- Index pour la table `subscription`
--
ALTER TABLE `subscription`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_USERS_groups_id` (`groups_id`), ADD KEY `FK_USERS_subscription_id` (`subscription_id`), ADD KEY `FK_USERS_newsletter_id` (`newsletter_id`), ADD KEY `rooms_id` (`rooms_id`), ADD KEY `groups_id` (`groups_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `chats`
--
ALTER TABLE `chats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `subscription`
--
ALTER TABLE `subscription`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
ADD CONSTRAINT `FK_USERS_newsletter_id` FOREIGN KEY (`newsletter_id`) REFERENCES `newsletters` (`email`),
ADD CONSTRAINT `FK_USERS_subscription_id` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
