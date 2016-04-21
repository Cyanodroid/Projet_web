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
(11, 'salut ceci est un test', 'Ceci sera ma réponse', 10, '2016-04-08 12:33:16'),
(12, 'salut ceci est un test', 'salut ceci est un test', 13, '2016-04-11 11:25:01');

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
(1, 'Programmation C'),
(2, 'Programmation Java'),
(3, 'Sécurité informatique');

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
(1, 'salut ceci est un test', '2016-04-02 20:34:53', 10, 1),
(3, 'Ceci sera ma réponse', '2016-04-08 12:01:28', 10, 1);

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
(19, 'fra', 'Posts', 18, 'title', 'Crypter ses mails avec Enigmail'),
(20, 'eng', 'Posts', 18, 'title', 'Encrypt your emails with Enigmail'),
(25, 'fra', 'Posts', 18, 'contenu', 'Plus de 200 milliards d’emails sont envoyés dans le monde chaque jour. Si l’email est un moyen extrêmement pratique pour échanger des informations, c’est également un outil très vulnérable : interception, usurpation d’identité, surveillance de boîte mail etc., sont autant de problèmes auxquels peuvent être confrontés les utilisateurs de boîtes emails. Il existe pourtant des moyens simples d’assurer la confidentialité de vos échanges sur Internet.Un des moyens d’augmenter la confidentialité de vos emails est d’utiliser un logiciel d’envoi et de réception d’emails tel que Thunderbird.L’un des aspects les plus importants de la sécurité d‘envoi d’emails est le mode de connexion que vous utilisez pour accéder à votre service de messagerie. Thunderbird permet de contrôler le mode de connexion à votre serveur de messagerie. Vous devez utiliser à chaque fois que c’st possible SSL (Secure socket layer) ou TLS  (Transport Layer security). Ces protocoles protègent votre mot de passe email d’une éventuelle interception que ce soit par un logiciel tiers installé sur votre système ou par tout point situé entre Thunderbird et votre serveur de messagerie.Thunderbird est un logiciel libre. Vous pouvez le télécharger gratuitement sur le site de la fondation Mozilla. Une fois Thunderbird installé, vous devez le paramétrer pour qu’il puisse se connecter à votre serveur de messagerie. Ne paniquez pas, Thunderbird fait (presque) tout, tout seul.Lorsque vous lancez Thunderbird pour la première fois, un assistant vous aide à configurer l''articulation entre votre compte et le client mail. Au lancement de cet assistant, si vous avez déjà une adresse email, cliquez sur  “Passer cette étape et utilisez mon adresse existante”. Tout ce que vous avez à connaître est votre adresse email, votre nom d’utilisateur et votre mot de passe. Entrez ces informations dans l’écran suivant. Thunderbird récupère pour vous  les informations sur le serveur de messagerie. Le logiciel configure automatiquement les adresses email des services email les plus répandus : Gmail, Yahoo, Hotmail...Si toutefois votre adresse email ne se trouve pas dans la base de données de service mail de Thunderbird, vous devrez configurer manuellement votre compte mail. Pour vous assurer que Thunderbird utilise bien SSL ou TLS, rendez-vous dans Outils > paramètres des comptes > Paramètres serveur, et vérifiez la section “Paramètres de sécurité”.L’utilisation de Thunderbird et des protocoles TLS ou SSL ne protège que la connexion entre votre ordinateur et le serveur de messagerie. Ceux-ci n’assurent pas la confidentialité de vos échanges avec un tiers. Vos emails peuvent en effet être interceptés en de nombreux points entre votre serveur de messagerie et l’ordinateur du destinataire de votre e-mail. Pour pallier ce problème, il est possible de chiffrer ses emails de bout en bout en utilisant le protocole PGP (Pretty Good Privacy).Installer PGP sous WindowsPour envoyer des emails chiffrés, vous avez besoin de 3 choses :Un logiciel permettant de générer votre clé secrète et de gérer les clés publiques de vos contacts : gpg4winUn client mail installé sur votre poste : ThunderbirdUn plugin permettant de chiffrer les emails : enigmailAprès avoir téléchargé et installé gpg4win, installez le plugin Enigmail pour ThunderBird.Dans Thunderbird : menu Outils > Modules complémentaires. La fenêtre des plugins s’ouvre.Entrez “Enigmail” dans la barre de recherche et cliquez sur l’icône de recherche.Cliquez sur “Ajouter cette extension”.Une fois l’installation effectuée, redémarrez le ThunderbirdInstaller PGP sous Mac OS XPour installer PGP sous Mac, il vous suffit d’installer la suite d’outils gratuite et open source GPGTools. Elle contient tous les outils nécessaires à l’utilisation de PGP sous mac OS X.Créez votre clé PGPPour chiffrer vos emails avec PGP, il vous faut créer une clé publique et une clé privée. Cette opération se fait simplement dans Thunderbird en suivant les étapes proposées par l’assistant de création PGP. Pour le lancer : dans Thunderbird, OpenPGP >> Assistant de configuration. '),
(26, 'eng', 'Posts', 18, 'contenu', 'Over 200 billion emails are sent worldwide every day. If the email is an extremely convenient way to exchange information, it is also a very vulnerable tool: interception, impersonation, email box monitoring etc., are all problems that may be faced users email boxes . But there are simple ways to ensure the confidentiality of your exchanges on Internet.A ways to increase the privacy of your emails is to use a software for sending and receiving emails as Thunderbird.L''un of the most important aspects of security of sending emails is the connection method you use to access your mail service. Thunderbird lets you control mode connection to your mail server. You must use whenever feasible c''st SSL (Secure Socket Layer) or TLS (Transport Layer security). These protocols protect your email password to possible interception whether by third party software installed on your system or any point between Thunderbird and your messagerie.Thunderbird server is free software. You can download it free on the Mozilla site. Once installed Thunderbird, you must set it so that it can connect to your mail server. Do not panic, Thunderbird is (almost) everything, seul.Lorsque you run Thunderbird for the first time, a wizard helps you configure the connection between your account and the mail client. To launch this wizard, if you already have an email address, click "Skip this step and use my existing address". All you have to know is your email address, your username and password. Enter this information in the next screen. Thunderbird automatically fetches the information on the mail server. The software automatically configures the email addresses of the most popular email service Gmail, Yahoo, Hotmail ... However, if your email address is not in the email service database Thunderbird, you need to manually configure your email account. To ensure that Thunderbird uses many SSL or TLS, go to Tools> Account Settings> Server Settings and check the "Security Settings" .The use Thunderbird and TLS or SSL only protects the connection between your computer and the mail server. These do not guarantee the confidentiality of your dealings with third parties. Your emails can indeed be intercepted at many points between your mail server and the computer of the recipient of your email. To overcome this problem, it is possible to encrypt emails from start to finish using the protocol PGP (Pretty Good Privacy) PGP .Insert under WindowsPour send encrypted emails, you need three things: A software to generate your key secret and manage public key contacts: gpg4winUn mail client installed on your computer: ThunderbirdUn plugin for encrypting emails: enigmailAprès have downloaded and installed Gpg4win, install the Enigmail plugin for ThunderBird.Dans Thunderbird: Tools> Add-ons. The window of plugins ouvre.Entrez "Enigmail" in the search bar and click the icon recherche.Cliquez "Add this extension" .Once the installation is complete, restart the Mac OS ThunderbirdInstaller PGP install XFor PGP Mac, you simply install the following free tools and open source gpgtools. It contains all the necessary tools to use PGP under Mac OS X.Créez your PGPPour key encrypt your emails with PGP, you must create a public key and a private key. This can easily be done in Thunderbird by following the steps proposed by the PGP Wizard. To start: in Thunderbird OpenPGP >> Setup Wizard.'),
(27, 'fra', 'Posts', 19, 'title', 'Bitdefender propose un vaccin gratuit contre les Ransomware'),
(28, 'eng', 'Posts', 19, 'title', 'Bitdefender offers free vaccine against Ransomware'),
(29, 'fra', 'Posts', 19, 'contenu', 'Les rançongiciels bloquent l’ordinateur ou chiffre les fichiers personnels (photos, musiques, documents, etc.) des utilisateurs en les rendant ainsi inaccessibles. L’utilisateur qu’il soit un particulier ou une entreprise doit alors payer une rançon pour reprendre le contrôle de ses données. Selon une étude Bitdefender, plus de la moitié des victimes sont prêtes à payer jusqu’à 460€ en moyenne pour récupérer leurs données. Cet appât du gain facile a donc accéléré la propagation de ce type de menaces, une partie des sommes ainsi colléctées étant elles mêmes réinvesties dans le développement de nouvelles variantes de ces ransomwares particulièrement lucratifs pour les cybercriminels.La protection contre les ransomwares est au cœur des solutions Bitdefender 2016 avec des technologies de protections multiniveaux et des outils de blocage du chiffrement par ces menaces.. Afin de participer à la lutte contre les ransomwares , Bitdefender met gratuitement à la disposition de tous un vaccin, qui protège efficacement contre les versions de certaines des menaces les plus diffusées en ce moment afin de protéger les utilisateurs contre les effets néfastes de :CTB-LockerLockyTeslaCryptVous pouvez télécharger gratuitement l’outil par le lien suivant : http://download.bitdefender.com/am/cw/BDAntiRansomwareSetup.exePour rappel,  la meilleure protection reste bien évidemment la prévention.'),
(30, 'eng', 'Posts', 19, 'contenu', 'Ransomware block the computer or encrypt personal files (photos, music, documents, etc.) users in making them inaccessible. The user whether an individual or company must pay a ransom to regain control of its data. According to Bitdefender study, more than half of the victims are willing to pay up to € 460 on average to recover their data. The lure of easy money has accelerated the spread of such threats, some of the money thus collected themselves being reinvested in the development of new variants of ransomware these particularly lucrative for cybercriminels.La protection against ransomware is at the heart of Bitdefender 2016 solutions multilevel protection technologies and encryption tools by blocking these threats .. to participate in the fight against ransomware, Bitdefender offers free available to all vaccine, which protects against the versions of some of the broadcast threats right now to protect users against harmful effects: CTB-LockerLockyTeslaCryptVous can download the tool from the following link: http://download.bitdefender.com/am/cw/BDAntiRansomwareSetup.exePour Remember that the best protection, of course, is prevention.'),
(31, 'fra', 'Posts', 20, 'title', 'Qu''est-ce qu''une injection SQL ?'),
(32, 'eng', 'Posts', 20, 'title', 'What is SQL injection?'),
(33, 'fra', 'Posts', 20, 'contenu', 'Si vous voulez comprendre comment fonctionne une faille de type SQLi afin de mieux sécuriser le code de votre site / application, le site CodeBashing qui propose des tutos interactifs pour apprendre à sécuriser son code, a mis en ligne une expérience plutôt bien foutue.Dans un petit exercice pas à pas, vous allez pouvoir explorer et comprendre le concept même d''injection SQL. Ça ne suffira pas à faire de vous un affreux pirate et tant mieux, mais pour la culture générale, c''est plutôt cool.Vous pouvez le tester ici : http://www.codebashing.com/try-it'),
(34, 'eng', 'Posts', 20, 'contenu', 'If you want to understand how a SQLi type of flaw to better secure the code of your site / application, the CodeBashing site that offers interactive tutorials to learn how to secure their code, has posted an experience rather a well foutue.Dans little exercise step by step, you''ll be able to explore and understand the same SQL injection concept. That alone will not make you a terrible pirate and better, but for the general culture, but rather cool.Vous can test it here: http://www.codebashing.com/try-it'),
(35, 'fra', 'Posts', 21, 'title', 'Hacking Team vient de perdre sa licence'),
(36, 'eng', 'Posts', 21, 'title', 'Hacking Team has lost its license'),
(37, 'fra', 'Posts', 21, 'contenu', 'La société italienne de vente de logiciels de surveillance Hacking Team s’est fait suspendre sa licence par le gouvernement italien pour œuvrer dans les pays hors-Europe d’après le journal Spiegel. Hacking Team est tristement célèbre pour avoir procuré de logiciels espions aux gouvernements et aux agences de renseignement dans le monde entier. Désormais, il ne peut plus être autorisé à le faire en dehors de l’Europe.La société est connue au royaume pour avoir vendu des outils d’espionnage informatique à certains clients marocains. Le 5 juillet 2015, l’entreprise italienne a été victime d’un piratage informatique. Les pirates auraient volé 400 gigaoctets de données confidentielles et hacké le compte Twitter de Christian Ponzi, l’un des responsables de la société. Publiés par WikiLeaks, les documents stipulent que le Conseil suprême de la défense nationale est l’un des clients intéressés par les services de Hacking Team.Une facture datée du 15 février 2013 que la société avait adressé au CSDN, domicilié à Rabat, faisait état de la vente d’un produit Hacking team. Facturé à 100 000 euros, le produit vendu était capable d’infecter la majorité des systèmes d’exploitation sans être détecté par les antivirus.L’association Reporters Sans Frontières qualifiait en 2012 l’enseigne «d’ennemi d’Internet». D’après les documents fuités sur la Toile, Hacking Team a vendu des logiciels à l’Égypte, au Maroc, au Brésil, en Malaisie, au Thaïlande, au Kazakhstan, au Vietnam, au Mexique et au Panama, entre autres.'),
(38, 'eng', 'Posts', 21, 'contenu', 'The Italian firm Hacking Team monitoring software sales became suspend his license by the Italian government to work in countries outside Europe according to Spiegel. Hacking Team is notorious for having procured spyware governments and intelligence agencies worldwide. Now it can not be allowed to do so outside the company Europe.La is known to the kingdom for selling computer spy tools to some Moroccan customers. On 5 July 2015, the Italian company has been a victim of hacking. Hackers have stolen 400 GB of confidential data and hacked the Twitter account of Christian Ponzi, one of the company officials. Published by WikiLeaks, the documents state that the Supreme Council of National Defense is one of the customers interested in Hacking Team.Une invoice services dated February 15, 2013 the company had addressed to CSDN, residing in Rabat, reported the sale of a product Hacking team. Charged 100 000, the product sold was able to infect the majority of operating systems without being detected by the antivirus.L''association Reporters Without Borders in 2012 termed the sign of "enemy of the Internet". According to documents leaked on the Internet, Hacking Team has sold software to Egypt, Morocco, Brazil, Malaysia, Thailand, Kazakhstan, Vietnam, Mexico and Panama, among others.'),
(39, 'fra', 'Posts', 22, 'title', 'Concours du programme C le plus obscur'),
(40, 'eng', 'Posts', 22, 'title', 'Most obscure C program Contest'),
(41, 'fra', 'Posts', 22, 'contenu', 'Le "International Obfuscated C Code Contest" ("Concours international de code C obscur") est un concours de programmation organisé chaque année depuis 1984. Il y a  plusieurs entrées gagnantes chaque année, et chaque année rentre dans une catégorie du genre : « Plus grand abus du préprocesseur C » ou « Comportement le plus incohérent ».A l''origin, les IOCCC ont été lancés par Landon Curt Noll et Larry Bassel. Ils étaient en train de parler du code abominable dont ils devaient faire la maintenance dans leur travail quotidien. Ils décidèrent alors d''organiser un concours du pire code C possible. Dans l''espace autorisé de seulement quelques kilooctets, les participants réussissent à faire des choses compliquées : le vainqueur de 2004 s''est révélé être un système d''exploitation.Tous les codes sont disponibles à l''adresse suivante : http://www.ioccc.org/index.html'),
(42, 'eng', 'Posts', 22, 'contenu', 'The "International Obfuscated C Code Contest" ( "International Competition obscure C code") is a programming contest organized every year since 1984. There are several winning entries each year, and every year go into a kind of category: "More C preprocessor great abuse "or" behavior as incoherent ".A the origin, the IOCCC were launched by Landon Curt Noll and Larry Bassel. They were talking about the abominable code they had to do maintenance in their daily work. They decided to organize a competition of C code worst possible. In the space of only a few kilobytes allowed the participants succeed in making things complicated: the 2004 winner turned out to be a exploitation.Tous system codes are available at the following address: http: // www .ioccc.org / index.html'),
(43, 'fra', 'Posts', 23, 'title', 'Les principes SOLID'),
(44, 'eng', 'Posts', 23, 'title', 'The SOLID principles'),
(45, 'fra', 'Posts', 23, 'contenu', 'Au premier abord les concepts objets ne sont pas simples à appréhender. Il est plus facile de raisonner de manière linéaire et concrète, que de manière abstraite et avec des notions d’héritage ou de polymorphisme. Cela nécessite un certain recul et une capacité d’abstraction qui n’est pas totalement intuitive et plus difficilement accessible.La conception orientée objet offre des mécanismes uniques de représentation de notre environnement mixant données et comportement, déclinant des notions génériques en de multiples plus spécialisées.Outre cette capacité à représenter les choses, la conception orientée objet offre également des mécanismes de tolérance au changement très puissants. Cette tolérance est un des facteurs clés du développement logiciel, la maintenance demandant souvent des efforts croissants au fil du temps et de l’évolution du logiciel.Mais comment caractériser l’intolérance au changement ? En voici les symptômes :La rigidité : « Chaque changement cause une cascade de modifications dans les modules dépendants. » Une intervention simple au premier abord se révèle être un véritable cauchemar, à la manière d’une pelote de laine qui n’a pas de fin.La fragilité : « Tendance d’un logiciel à casser en plusieurs endroits à chaque modification. ». La différence avec la rigidité réside dans le fait que les interventions sur le code peuvent avoir des répercussions sur des modules n’ayant aucune relation avec le code modifié. Toute intervention est soumise à un éventuel changement de comportement dans un autre module.L’immobilisme : « Incapacité du logiciel à pouvoir être réutilisé par d’autres projets ou par des parties de lui même. » – « Il est presque impossible de réutiliser des parties intéressantes du logiciel. » L’effort demandé et les risques encourus sont trop importants.La viscosité : « Il est plus facile de faire un contournement plutôt que de respecter la conception qui a été pensée. » Lorsque nous intervenons sur du code existant, nous avons souvent plusieurs possibilités d’implémentations. Nous allons retrouver des solutions préservant, améliorant le design du code et d’autres qui vont « casser » ce design. Lorsque cette dernière catégorie est plus simple à mettre en place, nous considérons que le code est visqueux.L’opacité correspond à la lisibilité et la simplicité de compréhension du code. La situation la plus courante est un code qui n’exprime pas sa fonction première. Ainsi, plus un code est difficile à lire et à comprendre et plus nous allons considérer que ce dernier est opaque.Dans le livre Agile Software Development, Pinciples, Patterns and Practices, Robert C. Martin a condensé, en 2002, cinq principes fondamentaux de conception, répondant à cette problématique d’évolutivité, sous l’acronyme SOLID :- Single responsibility principle- Open close principle- Liskov principle- Interface segregation principle- Dependency inversion principleSingle Responsibilty Principle« A class should have one reason to change. »Comme son nom l’indique, ce principe signifie qu’une classe ne doit posséder qu’une et une seule responsabilité. Mais pourquoi me direz-vous ? Si une classe a plus d’une responsabilité, ces dernières se retrouveront liées. Les modifications apportées à une responsabilité impacteront l’autre, augmentant la rigidité et la fragilité du code.Un certain nombre de techniques peut nous aider à appliquer le principe de SRP. Parmi elles nous retrouvons les CRC cards — Class Responsibility Collaboration.Open Closed Principle« Classes, methods should be open for extension, but closed for modifications. »Une classe, une méthode, un module doit pouvoir être étendu, supporter différentes implémentations (Open for extension) sans pour cela devoir être modifié (closed for modification).Les instanciations conditionnelles dans un constructeur sont de bons exemples de non respect de ce principe. Une nouvelle implémentation aura pour impact l’ajout d’une condition dans la méthode.Liskov Substitution Principle« Subtypes must be substituable for their base types. »Les sous classes doivent pouvoir être substituées à leur classe de base sans altérer le comportement de ses utilisateurs. Dit autrement, un utilisateur de la classe de base doit pouvoir continuer de fonctionner correctement si une classe dérivée de la classe principale lui est fournie à la place.Cela signifie, entre autres, qu’il ne faut pas lever d’exception imprévue (comme UnsupportedOperationException par exemple), ou modifier les valeurs des attributs de la classe principale d’une manière inadaptée, ne respectant pas le contrat défini par la méthode.Les cas de violation du principe de Liskov ne sont pas si fréquents en réalité et nous concevons en général des modèles qui ne violent pas ce principe. Cependant, cela peut se produire par précipitation ou méconnaissance des détails d’implémentation des classes de base et sa détection est, la plupart du temps, difficile. Je vous encourage donc à rester vigilant lorsque vous décider d’étendre une classe.Interface Segregation Principle« Clients should not be forced to depend on methods that they do not use. »Le but de ce principe est d’utiliser les interfaces pour définir des contrats, des ensembles de fonctionnalités répondant à un besoin fonctionnel, plutôt que de se contenter d’apporter de l’abstraction à nos classes. Il en découle une réduction du couplage, les clients dépendant uniquement des services qu’ils utilisent.L’utilisation systématique d’interface de type IMaClasse reprenant les méthodes publiques de la classe MaClasse n’est par conséquent pas une bonne pratique car cela lie nos contrats à leur implémentation, rendant délicat la réutilisation et les refactorings à venir.Une mise en garde cependant : un des travers de ce principe peut être de multiplier les interfaces. En poussant cette idée à l’extrême, nous pouvons imaginer une interface avec une méthode par client. Bien entendu, l’expérience, le pragmatisme et le bon sens sont nos meilleurs alliés dans ce domaine.Dependency Inversion Principle« High level modules should not depend on low level modules. Both should depend on abstractions. »« Abstractions should not depend on details. Details should depend on abstractions. »Attardons-nous sur la notion importante de ce principe : Inversion. Le principe de DIP stipule que les modules de haut niveau ne doivent pas dépendre de modules de plus bas niveau. Mais pour quelle raison ? Pour répondre à cette question, prenons la définition à l’envers : les modules de haut niveau dépendent de modules de bas niveau. En règle générale les modules de haut niveau contiennent le cœur – business – des applications. Lorsque ces modules dépendent de modules de plus bas niveau, les modifications effectuées dans les modules « bas niveau » peuvent avoir des répercussions sur les modules « haut niveau » et les « forcer » à appliquer des changements.'),
(46, 'eng', 'Posts', 23, 'contenu', 'At first the objects concepts are not easy to grasp. It is easier to reason with linear and concrete way that the abstract and with inheritance and polymorphism concepts. This requires a step back and a capacity for abstraction that is not totally intuitive and more difficult accessible.La object-oriented design offers unique mechanisms of representation of our environment combining data and behavior, declining generic concepts into multiple specialized .In addition this ability to represent things, object-oriented design also offers tolerance mechanisms to powerful change. This tolerance is a key factor in software development, maintenance, often requiring increased efforts over time and the evolution of how to characterize logiciel.Mais intolerance change? Here are the symptoms: rigidity, "Every change causes a cascade of changes in dependent modules. "A simple procedure at first appears to be a nightmare, like a ball of yarn that has no fin.La fragility" Trend software to break in several places at each change. ". The difference with the rigidity lies in the fact that interventions on the code can affect the modules having no relation with the modified code. Any intervention is subject to a possible change of behavior in another module.L''immobilisme: "Software Inability to be reused by other projects or parts of itself. "-" It is almost impossible to reuse the interesting parts of the software. "The effort and the risks are too importants.La viscosity:" It is easier to make a workaround rather than respect the design that has been thought. "When we work on existing code, we often have several opportunities implementations. We will find solutions conserving, improving the code and other design that will "break" this design. When the latter category is simpler to implement, we believe that the code is visqueux.L''opacité is the readability and simplicity of understanding of the code. The most common situation is a code that does not express its primary function. Thus, a code is more difficult to read and understand, and we consider that it is opaque.Dans the Agile Software Development book Pinciples, Patterns and Practices Robert C. Martin condensed, in 2002, five fundamental principles design, responding to this scalability problem, under the acronym SOLID: - Single Open responsibility principle- close principle- Liskov principle- Interface segregation principle- Dependency inversion principleSingle responsibilty Principle "shoulds A class-have one reason to change. "As the name suggests, this principle means that a class should have one and only one responsibility. Why you say? If a class has more than one responsibility, the latter will find themselves linked. Changes to liability will impact the other, increasing the rigidity and fragility of code.A number of techniques can help us apply the principle of SRP. Among them we find the CRC cards - Class Responsibility Collaboration.Open Closed Principle "Classes, methods shoulds be open for extension, closed for modification purpose. "A class, a method, a module must be extended, support different implementations (Open for extension) without it having to be changed (closed for modification) .The conditional instantiation in a constructor are good examples of non-compliance with this principle . A new implementation will impact the addition of a condition in the méthode.Liskov Substitution Principle "Subtypes must be substitutable for Their basic kinds. "The subclasses must be substituted in their base class without altering the behavior of its users. In other words, a user of the base class must be able to continue to function properly if a class derived from the main class is provided to him place.Cela means, among others, that we should not raise unexpected exception (as UnsupportedOperationException for example), or change the values ??of attributes of the main class of an improper manner, not respecting the contract defined by méthode.Les for violation of the principle of Liskov are not so frequent in reality and we design in General models that do not violate this principle. However, this can occur by precipitation or lack of knowledge of the implementation details of the base classes and its detection is mostly difficult. I encourage you to remain vigilant when deciding to extend a classe.Interface Segregation Principle "Clients shoulds not be forced to depend on methods That They Do not use. "The aim of this principle is to use interfaces to define contracts, sets of features to meet a functional need, rather than simply provide abstraction to our classes. This results in a reduction of the coupling, customers only dependent on the services they Interface systematic utilisent.L''utilisation type IMaClasse taking public methods of the MyClass class is therefore not a good practice because it links our contracts to their implementation, making delicate reuse and refactorings to venir.Une caution though: one through this principle can be multiplied interfaces. Taking this idea to the extreme, we can imagine an interface with a client method. Of course, experience, pragmatism and common sense are our best allies in this domaine.Dependency Inversion Principle "High level modules shoulds not depend on low level modules. Both shoulds depend on abstractions. "" Abstractions shoulds not depend on details. Details shoulds depend on abstractions. "Let''s look at the important concept of this principle: Inversion. The principle of DIP states that high-level modules should not depend on low-level modules. But why? To answer this question, consider the definition in reverse: the high level modules depend on low-level modules. Typically the top level modules contain heart - business - applications. When these modules are dependent on lower level modules, changes in the "low level" modules can affect the "high level" modules and "force" to apply changes.');

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
(2, 'nicolas.grellety@gmail.com'),
(4, 'site.collaboratif.test@gmail.com'),
(5, 'link-midona@hotmail.fr');

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
(18, 'Crypter ses mails avec Enigmail', 1, 'Plus de 200 milliards d’emails sont envoyés dans le monde chaque jour. Si l’email est un moyen extrêmement pratique pour échanger des informations, c’est également un outil très vulnérable : interception, usurpation d’identité, surveillance de boîte mail etc., sont autant de problèmes auxquels peuvent être confrontés les utilisateurs de boîtes emails. Il existe pourtant des moyens simples d’assurer la confidentialité de vos échanges sur Internet.Un des moyens d’augmenter la confidentialité de vos emails est d’utiliser un logiciel d’envoi et de réception d’emails tel que Thunderbird.L’un des aspects les plus importants de la sécurité d‘envoi d’emails est le mode de connexion que vous utilisez pour accéder à votre service de messagerie. Thunderbird permet de contrôler le mode de connexion à votre serveur de messagerie. Vous devez utiliser à chaque fois que c’st possible SSL (Secure socket layer) ou TLS  (Transport Layer security). Ces protocoles protègent votre mot de passe email d’une éventuelle interception que ce soit par un logiciel tiers installé sur votre système ou par tout point situé entre Thunderbird et votre serveur de messagerie.Thunderbird est un logiciel libre. Vous pouvez le télécharger gratuitement sur le site de la fondation Mozilla. Une fois Thunderbird installé, vous devez le paramétrer pour qu’il puisse se connecter à votre serveur de messagerie. Ne paniquez pas, Thunderbird fait (presque) tout, tout seul.Lorsque vous lancez Thunderbird pour la première fois, un assistant vous aide à configurer l''articulation entre votre compte et le client mail. Au lancement de cet assistant, si vous avez déjà une adresse email, cliquez sur  “Passer cette étape et utilisez mon adresse existante”. Tout ce que vous avez à connaître est votre adresse email, votre nom d’utilisateur et votre mot de passe. Entrez ces informations dans l’écran suivant. Thunderbird récupère pour vous  les informations sur le serveur de messagerie. Le logiciel configure automatiquement les adresses email des services email les plus répandus : Gmail, Yahoo, Hotmail...Si toutefois votre adresse email ne se trouve pas dans la base de données de service mail de Thunderbird, vous devrez configurer manuellement votre compte mail. Pour vous assurer que Thunderbird utilise bien SSL ou TLS, rendez-vous dans Outils > paramètres des comptes > Paramètres serveur, et vérifiez la section “Paramètres de sécurité”.L’utilisation de Thunderbird et des protocoles TLS ou SSL ne protège que la connexion entre votre ordinateur et le serveur de messagerie. Ceux-ci n’assurent pas la confidentialité de vos échanges avec un tiers. Vos emails peuvent en effet être interceptés en de nombreux points entre votre serveur de messagerie et l’ordinateur du destinataire de votre e-mail. Pour pallier ce problème, il est possible de chiffrer ses emails de bout en bout en utilisant le protocole PGP (Pretty Good Privacy).Installer PGP sous WindowsPour envoyer des emails chiffrés, vous avez besoin de 3 choses :Un logiciel permettant de générer votre clé secrète et de gérer les clés publiques de vos contacts : gpg4winUn client mail installé sur votre poste : ThunderbirdUn plugin permettant de chiffrer les emails : enigmailAprès avoir téléchargé et installé gpg4win, installez le plugin Enigmail pour ThunderBird.Dans Thunderbird : menu Outils > Modules complémentaires. La fenêtre des plugins s’ouvre.Entrez “Enigmail” dans la barre de recherche et cliquez sur l’icône de recherche.Cliquez sur “Ajouter cette extension”.Une fois l’installation effectuée, redémarrez le ThunderbirdInstaller PGP sous Mac OS XPour installer PGP sous Mac, il vous suffit d’installer la suite d’outils gratuite et open source GPGTools. Elle contient tous les outils nécessaires à l’utilisation de PGP sous mac OS X.Créez votre clé PGPPour chiffrer vos emails avec PGP, il vous faut créer une clé publique et une clé privée. Cette opération se fait simplement dans Thunderbird en suivant les étapes proposées par l’assistant de création PGP. Pour le lancer : dans Thunderbird, OpenPGP >> Assistant de configuration. ', '2016-04-08 22:40:00', 10, 3),
(19, 'Bitdefender propose un vaccin gratuit contre les Ransomware', 1, 'Les rançongiciels bloquent l’ordinateur ou chiffre les fichiers personnels (photos, musiques, documents, etc.) des utilisateurs en les rendant ainsi inaccessibles. L’utilisateur qu’il soit un particulier ou une entreprise doit alors payer une rançon pour reprendre le contrôle de ses données. Selon une étude Bitdefender, plus de la moitié des victimes sont prêtes à payer jusqu’à 460€ en moyenne pour récupérer leurs données. Cet appât du gain facile a donc accéléré la propagation de ce type de menaces, une partie des sommes ainsi colléctées étant elles mêmes réinvesties dans le développement de nouvelles variantes de ces ransomwares particulièrement lucratifs pour les cybercriminels.La protection contre les ransomwares est au cœur des solutions Bitdefender 2016 avec des technologies de protections multiniveaux et des outils de blocage du chiffrement par ces menaces.. Afin de participer à la lutte contre les ransomwares , Bitdefender met gratuitement à la disposition de tous un vaccin, qui protège efficacement contre les versions de certaines des menaces les plus diffusées en ce moment afin de protéger les utilisateurs contre les effets néfastes de :CTB-LockerLockyTeslaCryptVous pouvez télécharger gratuitement l’outil par le lien suivant : http://download.bitdefender.com/am/cw/BDAntiRansomwareSetup.exePour rappel,  la meilleure protection reste bien évidemment la prévention.', '2016-04-08 23:04:00', 10, 3),
(20, 'Qu''est-ce qu''une injection SQL ?', 1, 'Si vous voulez comprendre comment fonctionne une faille de type SQLi afin de mieux sécuriser le code de votre site / application, le site CodeBashing qui propose des tutos interactifs pour apprendre à sécuriser son code, a mis en ligne une expérience plutôt bien foutue.Dans un petit exercice pas à pas, vous allez pouvoir explorer et comprendre le concept même d''injection SQL. Ça ne suffira pas à faire de vous un affreux pirate et tant mieux, mais pour la culture générale, c''est plutôt cool.Vous pouvez le tester ici : http://www.codebashing.com/try-it', '2016-04-08 23:09:00', 10, 3),
(21, 'Hacking Team vient de perdre sa licence', 1, 'La société italienne de vente de logiciels de surveillance Hacking Team s’est fait suspendre sa licence par le gouvernement italien pour œuvrer dans les pays hors-Europe d’après le journal Spiegel. Hacking Team est tristement célèbre pour avoir procuré de logiciels espions aux gouvernements et aux agences de renseignement dans le monde entier. Désormais, il ne peut plus être autorisé à le faire en dehors de l’Europe.La société est connue au royaume pour avoir vendu des outils d’espionnage informatique à certains clients marocains. Le 5 juillet 2015, l’entreprise italienne a été victime d’un piratage informatique. Les pirates auraient volé 400 gigaoctets de données confidentielles et hacké le compte Twitter de Christian Ponzi, l’un des responsables de la société. Publiés par WikiLeaks, les documents stipulent que le Conseil suprême de la défense nationale est l’un des clients intéressés par les services de Hacking Team.Une facture datée du 15 février 2013 que la société avait adressé au CSDN, domicilié à Rabat, faisait état de la vente d’un produit Hacking team. Facturé à 100 000 euros, le produit vendu était capable d’infecter la majorité des systèmes d’exploitation sans être détecté par les antivirus.L’association Reporters Sans Frontières qualifiait en 2012 l’enseigne «d’ennemi d’Internet». D’après les documents fuités sur la Toile, Hacking Team a vendu des logiciels à l’Égypte, au Maroc, au Brésil, en Malaisie, au Thaïlande, au Kazakhstan, au Vietnam, au Mexique et au Panama, entre autres.', '2016-04-08 23:13:00', 10, 3),
(22, 'Concours du programme C le plus obscur', 1, 'Le "International Obfuscated C Code Contest" ("Concours international de code C obscur") est un concours de programmation organisé chaque année depuis 1984. Il y a  plusieurs entrées gagnantes chaque année, et chaque année rentre dans une catégorie du genre : « Plus grand abus du préprocesseur C » ou « Comportement le plus incohérent ».A l''origin, les IOCCC ont été lancés par Landon Curt Noll et Larry Bassel. Ils étaient en train de parler du code abominable dont ils devaient faire la maintenance dans leur travail quotidien. Ils décidèrent alors d''organiser un concours du pire code C possible. Dans l''espace autorisé de seulement quelques kilooctets, les participants réussissent à faire des choses compliquées : le vainqueur de 2004 s''est révélé être un système d''exploitation.Tous les codes sont disponibles à l''adresse suivante : http://www.ioccc.org/index.html', '2016-04-08 23:32:00', 10, 1),
(23, 'Les principes SOLID', 1, 'Au premier abord les concepts objets ne sont pas simples à appréhender. Il est plus facile de raisonner de manière linéaire et concrète, que de manière abstraite et avec des notions d’héritage ou de polymorphisme. Cela nécessite un certain recul et une capacité d’abstraction qui n’est pas totalement intuitive et plus difficilement accessible.La conception orientée objet offre des mécanismes uniques de représentation de notre environnement mixant données et comportement, déclinant des notions génériques en de multiples plus spécialisées.Outre cette capacité à représenter les choses, la conception orientée objet offre également des mécanismes de tolérance au changement très puissants. Cette tolérance est un des facteurs clés du développement logiciel, la maintenance demandant souvent des efforts croissants au fil du temps et de l’évolution du logiciel.Mais comment caractériser l’intolérance au changement ? En voici les symptômes :La rigidité : « Chaque changement cause une cascade de modifications dans les modules dépendants. » Une intervention simple au premier abord se révèle être un véritable cauchemar, à la manière d’une pelote de laine qui n’a pas de fin.La fragilité : « Tendance d’un logiciel à casser en plusieurs endroits à chaque modification. ». La différence avec la rigidité réside dans le fait que les interventions sur le code peuvent avoir des répercussions sur des modules n’ayant aucune relation avec le code modifié. Toute intervention est soumise à un éventuel changement de comportement dans un autre module.L’immobilisme : « Incapacité du logiciel à pouvoir être réutilisé par d’autres projets ou par des parties de lui même. » – « Il est presque impossible de réutiliser des parties intéressantes du logiciel. » L’effort demandé et les risques encourus sont trop importants.La viscosité : « Il est plus facile de faire un contournement plutôt que de respecter la conception qui a été pensée. » Lorsque nous intervenons sur du code existant, nous avons souvent plusieurs possibilités d’implémentations. Nous allons retrouver des solutions préservant, améliorant le design du code et d’autres qui vont « casser » ce design. Lorsque cette dernière catégorie est plus simple à mettre en place, nous considérons que le code est visqueux.L’opacité correspond à la lisibilité et la simplicité de compréhension du code. La situation la plus courante est un code qui n’exprime pas sa fonction première. Ainsi, plus un code est difficile à lire et à comprendre et plus nous allons considérer que ce dernier est opaque.Dans le livre Agile Software Development, Pinciples, Patterns and Practices, Robert C. Martin a condensé, en 2002, cinq principes fondamentaux de conception, répondant à cette problématique d’évolutivité, sous l’acronyme SOLID :- Single responsibility principle- Open close principle- Liskov principle- Interface segregation principle- Dependency inversion principleSingle Responsibilty Principle« A class should have one reason to change. »Comme son nom l’indique, ce principe signifie qu’une classe ne doit posséder qu’une et une seule responsabilité. Mais pourquoi me direz-vous ? Si une classe a plus d’une responsabilité, ces dernières se retrouveront liées. Les modifications apportées à une responsabilité impacteront l’autre, augmentant la rigidité et la fragilité du code.Un certain nombre de techniques peut nous aider à appliquer le principe de SRP. Parmi elles nous retrouvons les CRC cards — Class Responsibility Collaboration.Open Closed Principle« Classes, methods should be open for extension, but closed for modifications. »Une classe, une méthode, un module doit pouvoir être étendu, supporter différentes implémentations (Open for extension) sans pour cela devoir être modifié (closed for modification).Les instanciations conditionnelles dans un constructeur sont de bons exemples de non respect de ce principe. Une nouvelle implémentation aura pour impact l’ajout d’une condition dans la méthode.Liskov Substitution Principle« Subtypes must be substituable for their base types. »Les sous classes doivent pouvoir être substituées à leur classe de base sans altérer le comportement de ses utilisateurs. Dit autrement, un utilisateur de la classe de base doit pouvoir continuer de fonctionner correctement si une classe dérivée de la classe principale lui est fournie à la place.Cela signifie, entre autres, qu’il ne faut pas lever d’exception imprévue (comme UnsupportedOperationException par exemple), ou modifier les valeurs des attributs de la classe principale d’une manière inadaptée, ne respectant pas le contrat défini par la méthode.Les cas de violation du principe de Liskov ne sont pas si fréquents en réalité et nous concevons en général des modèles qui ne violent pas ce principe. Cependant, cela peut se produire par précipitation ou méconnaissance des détails d’implémentation des classes de base et sa détection est, la plupart du temps, difficile. Je vous encourage donc à rester vigilant lorsque vous décider d’étendre une classe.Interface Segregation Principle« Clients should not be forced to depend on methods that they do not use. »Le but de ce principe est d’utiliser les interfaces pour définir des contrats, des ensembles de fonctionnalités répondant à un besoin fonctionnel, plutôt que de se contenter d’apporter de l’abstraction à nos classes. Il en découle une réduction du couplage, les clients dépendant uniquement des services qu’ils utilisent.L’utilisation systématique d’interface de type IMaClasse reprenant les méthodes publiques de la classe MaClasse n’est par conséquent pas une bonne pratique car cela lie nos contrats à leur implémentation, rendant délicat la réutilisation et les refactorings à venir.Une mise en garde cependant : un des travers de ce principe peut être de multiplier les interfaces. En poussant cette idée à l’extrême, nous pouvons imaginer une interface avec une méthode par client. Bien entendu, l’expérience, le pragmatisme et le bon sens sont nos meilleurs alliés dans ce domaine.Dependency Inversion Principle« High level modules should not depend on low level modules. Both should depend on abstractions. »« Abstractions should not depend on details. Details should depend on abstractions. »Attardons-nous sur la notion importante de ce principe : Inversion. Le principe de DIP stipule que les modules de haut niveau ne doivent pas dépendre de modules de plus bas niveau. Mais pour quelle raison ? Pour répondre à cette question, prenons la définition à l’envers : les modules de haut niveau dépendent de modules de bas niveau. En règle générale les modules de haut niveau contiennent le cœur – business – des applications. Lorsque ces modules dépendent de modules de plus bas niveau, les modifications effectuées dans les modules « bas niveau » peuvent avoir des répercussions sur les modules « haut niveau » et les « forcer » à appliquer des changements.', '2016-04-08 23:49:00', 10, 2);

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
(2, 'Programmation en C', 0),
(3, 'Programmation en Java', 0),
(4, 'Sécurité informatique', 0);

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
(10, 'nicolas', '701c5fc2079bc159ace8a2325928ed2a70074306', '2016-02-17 13:50:33', 1, '', NULL, 'site.collaboratif.test@gmail.com', 1, 4, 1, 0),
(12, 'usernico', '701c5fc2079bc159ace8a2325928ed2a70074306', '2016-04-10 12:26:06', 1, '', '2016-05-10 13:24:00', 'link-midona@hotmail.fr', 3, 5, 1, 0),
(13, 'clay12', '701c5fc2079bc159ace8a2325928ed2a70074306', '2016-04-11 11:23:29', 1, '', '2035-04-11 12:17:00', 'claire.teoulle@live.fr', 4, NULL, 0, 0);

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
