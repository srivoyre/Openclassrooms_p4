-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 05 août 2020 à 12:27
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `lastPublishedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `createdAt`, `user_id`, `order_num`, `published`, `lastPublishedDate`) VALUES
(84, 'Chapitre 1', '<div class=\"col-md-8 center\">\r\n<div id=\"texte\" class=\"well\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse blandit sollicitudin leo eu imperdiet. Vivamus in eros et lorem porttitor consectetur vitae nec eros. Morbi elit risus, elementum vitae nulla ut, viverra fermentum neque. Donec scelerisque mi at viverra pellentesque. Integer gravida eleifend euismod. Nulla ullamcorper aliquam nisl sit amet pretium. Donec condimentum enim lacus, nec venenatis massa consequat sit amet. Donec rutrum orci eget posuere ullamcorper.</p>\r\n<p><span style=\"text-decoration: underline;\"><strong>Maecenas vel pretium neque, sit amet maximus quam. </strong></span></p>\r\n<p>Maecenas fringilla purus at diam aliquam facilisis. Nulla sit amet lorem non ante mattis bibendum. Praesent in metus blandit, scelerisque ex et, lobortis magna. Etiam lobortis orci dolor, id fermentum turpis maximus nec. Fusce posuere lacus id sem ornare faucibus. Integer gravida efficitur odio a dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur non nisi vitae mi tristique pellentesque. Morbi scelerisque mi non congue porta. Aliquam efficitur elit sed suscipit tempor. Proin id purus volutpat, placerat mi congue, pellentesque augue. Praesent quis eros at purus dapibus elementum a vitae lacus. Aliquam erat volutpat. Donec ut vehicula lacus.</p>\r\n<p>Morbi dignissim in dui quis imperdiet. Maecenas et sapien sollicitudin, accumsan ante a, commodo magna. Maecenas blandit quam ac diam luctus vulputate. Maecenas sed leo sit amet massa condimentum congue ut nec erat.<em> Nulla et volutpat orci</em>. Etiam et sem iaculis, volutpat arcu quis, dapibus sapien. Vivamus semper felis ut sagittis finibus. Fusce nibh nunc, posuere vel feugiat eget, tempus vel nisl.</p>\r\n<p>Nunc tempus tellus efficitur, eleifend nisi in, lacinia lectus. Donec vel ante lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut eu nunc eleifend, vestibulum urna eget, fringilla nunc. Nam quis vulputate velit. Duis maximus dui dolor, accumsan blandit turpis vestibulum ac. Nulla viverra sed sapien quis vehicula. Sed arcu augue, eleifend iaculis condimentum et, gravida id augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam quis neque nec sem maximus fermentum ac eu eros. Nullam eros nulla, egestas eget hendrerit at, bibendum eu neque. Etiam suscipit arcu eget nisl tempus luctus. Quisque vehicula libero nec tempus molestie.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://tse3.mm.bing.net/th?id=OIP.tlhzxM9HnCS6u3Dxqj-ImQHaE7&amp;pid=Api\" alt=\"\" width=\"346\" height=\"230\" /></p>\r\n<p>Vestibulum nec orci eu elit finibus lobortis. Nunc consequat felis sed mauris vehicula varius. Pellentesque ac velit id velit vestibulum malesuada sed id odio. Fusce finibus, nisi et dictum interdum, leo sapien malesuada arcu, pellentesque tristique massa ex non purus. Vestibulum a purus pharetra libero pharetra maximus. Sed orci nisi, dapibus eget consectetur et, volutpat id metus. Duis venenatis laoreet suscipit. Praesent rhoncus pharetra elit, ut laoreet ex iaculis vulputate. Pellentesque rhoncus fringilla ullamcorper. Etiam vel nulla tellus. Donec ultricies volutpat feugiat. Donec ut suscipit elit, sed hendrerit metus.</p>\r\n</div>\r\n</div>', '2020-07-03 09:28:27', 16, 1, 1, '2020-07-15 09:21:14'),
(85, 'Chapitre 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget tellus interdum, auctor augue sit amet, molestie enim. Mauris sollicitudin tempor turpis, non vulputate ipsum aliquet vel. In vestibulum metus et vestibulum mollis. Donec pellentesque, ex nec mattis pharetra, libero magna commodo mauris, id commodo sem ipsum eu quam. Nunc pretium fermentum ligula id rhoncus. Fusce a congue dui, eu interdum tellus. Morbi mattis eget purus et hendrerit. Aenean quis diam et diam fringilla hendrerit. Nulla vitae erat ut mauris pharetra congue at quis odio. Nam id nisl vel est feugiat gravida. Praesent sed lorem sit amet ex facilisis commodo. Pellentesque imperdiet, arcu in imperdiet dapibus, urna nunc mattis augue, vitae interdum mi felis ut leo. Pellentesque pharetra turpis est, suscipit finibus tortor rutrum at. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n<p style=\"padding-left: 40px;\"><span style=\"background-color: #c2e0f4;\"><em>Aenean iaculis ligula tellus, sed tempus mi laoreet dapibus. Aenean finibus, quam id egestas finibus, elit augue gravida odio, a convallis dolor tellus nec velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras et gravida odio, eu suscipit purus. Aenean nec orci sed massa facilisis pellentesque vitae et sapien. Phasellus vulputate lectus massa, eget malesuada dui fringilla ut. Donec interdum nulla eget pretium ultrices. Sed placerat rutrum porttitor. Morbi volutpat bibendum tincidunt.</em></span></p>\r\n<p>Duis magna justo, elementum eget risus ut, porta lobortis metus. Proin nec quam ac velit vulputate sodales et non est. Donec ac cursus est. Donec libero erat, tincidunt ac lacus non, tincidunt pretium magna. <em>Nam id tempor neque. Sed ullamcorper libero sit amet arcu congue fermentum</em>. Nulla vitae nibh metus. Nulla vulputate finibus dui, at luctus purus auctor eget. Curabitur elementum a risus mollis laoreet. Ut bibendum rutrum purus, a tincidunt nulla egestas non. Donec sit amet pretium dui, vitae suscipit ligula. Quisque pulvinar sed quam ut volutpat. Vestibulum a lacus eget mauris tempor molestie.</p>\r\n<p>Phasellus vitae lectus at lacus tincidunt lobortis at vitae dui. Fusce id eleifend sem. Morbi nec enim metus. Morbi ut porttitor metus. Suspendisse id tortor blandit, ullamcorper leo at, accumsan massa. Sed eget ultrices justo. Morbi convallis odio nec dictum placerat. Fusce tincidunt feugiat dui, vitae aliquam metus euismod pretium. Donec pretium mi sit amet faucibus porttitor. Proin sit amet sagittis dui.</p>\r\n<p>Aenean vitae egestas risus. Maecenas eget dui iaculis, aliquet ex vitae, rhoncus velit. Praesent fringilla cursus quam in ultrices. Mauris suscipit ullamcorper convallis. Sed accumsan odio felis, venenatis consectetur tellus tincidunt vitae. Morbi magna risus, tincidunt sit amet augue sed, venenatis ornare enim. Pellentesque eu condimentum lacus, ultrices volutpat purus. Mauris ante purus, tempor at sem in, porttitor ullamcorper nunc. Sed ac ultricies dolor. Vivamus sit amet ex posuere, tempor risus sed, volutpat mi. Vestibulum mattis mollis dui. Fusce placerat justo sed ullamcorper sagittis. Cras consequat, dui laoreet cursus mollis, diam ligula ultricies tellus, sit amet porttitor ex augue vel purus. Sed eu diam magna. Integer aliquam vehicula eros, ac commodo urna aliquet vitae. Nunc non mi ullamcorper tellus feugiat malesuada.</p>\r\n<table style=\"border-collapse: collapse; width: 100%;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 9.53847%;\"><img src=\"https://i.pinimg.com/originals/36/79/e1/3679e14d03f26af9c57216e6a1a1f04e.jpg\" alt=\"\" width=\"100\" height=\"150\" /></td>\r\n<td style=\"width: 88.0119%;\">Duis vel purus in arcu mollis condimentum. Etiam imperdiet varius nulla, ut tincidunt ex ornare dapibus. Nunc in eros turpis. Donec dapibus nisl non est ultrices, et finibus metus ultrices. Vivamus in velit et purus suscipit convallis sed tincidunt nibh. In varius turpis sed leo porttitor tincidunt. Praesent enim libero, tincidunt nec nibh et, cursus fermentum risus. Curabitur rutrum turpis ullamcorper mollis scelerisque.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Phasellus accumsan diam eu lectus dictum, nec <em>fermentum</em> lectus convallis. Aenean porttitor congue lectus. Phasellus quis tortor sit amet tortor sollicitudin sagittis sed efficitur nulla. Integer id dolor non nulla fermentum tempus. Phasellus eget condimentum arcu, quis elementum tortor. Sed tristique ullamcorper neque sed consectetur. Pellentesque at neque tristique, dapibus tortor vitae, lacinia purus. Maecenas porttitor id libero tincidunt facilisis. Nullam fringilla posuere mauris in dapibus. Integer volutpat urna vitae justo sagittis, nec volutpat quam maximus. Vivamus gravida lectus vel nisi dignissim, sed porta nunc commodo.</p>', '2020-07-18 10:42:42', 16, 2, 1, '2020-07-31 09:21:16'),
(86, 'Chapitre 4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis ante sit amet leo commodo, ac sodales ex interdum. Duis cursus faucibus auctor. Sed nec lectus vitae augue egestas aliquet sit amet pellentesque dolor. Sed imperdiet lorem sed quam fermentum egestas. Curabitur et libero purus. Fusce mollis quam in orci sollicitudin, ac vulputate sapien semper. In laoreet sapien massa, et bibendum eros faucibus eget. Aliquam mattis velit nec dolor luctus feugiat. Nam massa nibh, consequat elementum felis vitae, lobortis tristique arcu.</p>\r\n<p>Cras eu quam et justo volutpat fringilla. Curabitur pretium diam vitae mi sagittis, et varius lectus fringilla. Proin augue dolor, laoreet pulvinar magna vel, convallis rhoncus erat. Nam sed dui at urna commodo tempus in lobortis turpis. Aliquam erat volutpat. Proin sagittis odio malesuada mollis ultricies. Nullam lorem est, euismod ac felis vitae, gravida congue nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim turpis sit amet nunc accumsan commodo. Phasellus eu leo tincidunt, condimentum ipsum sed, malesuada ligula. Suspendisse pulvinar dignissim nisi eu venenatis. Cras pharetra ut nunc vel congue. Duis ac nulla turpis.</p>\r\n<p>Sed feugiat risus sed mi lobortis mattis. Nullam at odio non lorem malesuada venenatis ut vitae velit. Vivamus tortor mauris, ultrices nec gravida pulvinar, elementum non nisl. Nunc varius augue nec nulla congue, in placerat ante venenatis. Aliquam arcu erat, lacinia nec congue vel, feugiat in nibh. Donec tristique volutpat libero, quis varius dui placerat a. Vivamus vel molestie magna. Quisque consequat dolor sodales finibus tristique. Nam ac tincidunt lectus. Nunc ac finibus arcu.</p>\r\n<table style=\"border-collapse: collapse; width: 49.9142%; height: 63px; border-style: double; margin-left: auto; margin-right: auto;\" border=\"3\"><caption>&nbsp;</caption>\r\n<tbody>\r\n<tr style=\"height: 21px; border-color: #000000; border-style: double;\">\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\"><em><strong>laoreet</strong></em></td>\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\"><em><strong>laoreet</strong></em></td>\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\"><em><strong>feugiat</strong></em></td>\r\n<td style=\"width: 23.861%; height: 21px; text-align: center;\"><em><strong>curae</strong></em></td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\">1</td>\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\">3</td>\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\">4</td>\r\n<td style=\"width: 23.861%; height: 21px; text-align: center;\">3,5</td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\">6</td>\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\">6</td>\r\n<td style=\"width: 23.7752%; height: 21px; text-align: center;\">2,5</td>\r\n<td style=\"width: 23.861%; height: 21px; text-align: center;\">4</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras convallis ligula urna, eget gravida neque efficitur vitae. Aliquam erat volutpat. Duis elit nisl, pellentesque sed bibendum cursus, pellentesque vel justo. Vivamus neque lacus, finibus quis iaculis euismod, suscipit ac turpis. Praesent suscipit gravida sapien, quis malesuada arcu accumsan sed. Quisque lorem nibh, laoreet id laoreet&nbsp;id, feugiat vitae tellus. Aenean ut diam nibh. Phasellus eleifend felis quis ex hendrerit, quis malesuada sapien laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed convallis augue libero, non cursus risus venenatis id. Phasellus tincidunt justo ut interdum vulputate. Phasellus at enim non nisi tincidunt auctor vel at sapien.</p>\r\n<p>Sed sit amet ante at enim fringilla accumsan. Maecenas at massa nunc. Donec interdum eleifend nisi ac tristique. Nunc et malesuada arcu. Pellentesque ut bibendum enim. Suspendisse sed neque condimentum, porttitor metus in, pretium nisi. Pellentesque fringilla, ex in consectetur accumsan, est diam posuere neque, sed aliquam magna ipsum et purus. Sed vitae orci nisi. Ut porta diam neque, ac blandit enim dapibus id. Nam odio lectus, vestibulum vel lacus id, pulvinar ultricies libero. Sed fermentum arcu sit amet ligula pulvinar pretium.</p>', '2020-08-01 09:15:55', 16, 4, 1, '2020-08-21 09:21:34'),
(87, 'Chapitre 3', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.geographicus.com/mm5/graphics/00000001/L/NorthwestPassage-schraembl-1788.jpg\" alt=\"\" width=\"660\" height=\"394\" /></p>\r\n<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nisi dictum, porta erat quis, tincidunt eros. Mauris hendrerit sem eu velit ultrices commodo. Proin vel lacinia lorem. Pellentesque metus lacus, suscipit in aliquam ut, pellentesque ultrices magna. Proin ac neque sit amet nibh rutrum dignissim. Vivamus ultricies in nibh at ultrices. In eros tellus, convallis ac ex id, commodo lobortis tellus. Praesent sit amet tortor nisi. Donec rhoncus enim et nulla rutrum, non dapibus urna congue. Morbi tempus mi nibh, non mattis est rhoncus imperdiet. Phasellus molestie blandit massa a blandit. Quisque lacinia orci nec enim mattis aliquam. Suspendisse eu mi id turpis hendrerit pretium sed porttitor lectus. Phasellus vehicula ullamcorper lorem laoreet malesuada.</p>\r\n<p style=\"text-align: justify;\">Sed non rutrum nisl. Mauris sit amet dui tortor. Suspendisse faucibus sollicitudin diam, quis vulputate nulla pellentesque et. Nunc tristique, ex et tempor vehicula, sem dolor vulputate elit, ut sodales est nulla vitae neque. Pellentesque non mattis metus, ut placerat massa. Aliquam facilisis auctor interdum. Nulla efficitur dolor vitae euismod ultricies. Curabitur ut vulputate nisl, id porttitor ipsum. Integer sagittis non erat eget tempor. Duis aliquam tortor nulla, id convallis mi accumsan non. Donec sollicitudin lobortis nulla, eget scelerisque sem dictum sed.</p>\r\n<p style=\"text-align: justify;\">In non tortor nisl. Mauris in elementum purus. Donec dictum metus eu leo scelerisque, ac ultrices enim imperdiet. Nullam non sem non libero rutrum tristique sit amet eu mi. Aenean dapibus at augue at posuere. Nunc porta, lorem ullamcorper luctus tristique, velit nisi laoreet turpis, eu pellentesque leo metus finibus est. Nulla neque augue, condimentum id elit sit amet, finibus egestas urna. Fusce ultricies sapien gravida vestibulum venenatis. Sed vehicula interdum luctus.</p>', '2020-08-05 14:29:04', 16, 3, 1, '2020-08-11 09:21:17'),
(88, 'Chapitre 5', '<hr />\r\n<div id=\"Content\">\r\n<div id=\"bannerL\"></div>\r\n<div id=\"bannerR\"></div>\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pulvinar pulvinar dolor nec varius. Quisque nunc lacus, facilisis in nulla suscipit, fermentum porttitor mi. Phasellus fringilla justo sit amet ex consequat egestas at quis justo. Sed volutpat tellus at nunc viverra, quis gravida ipsum sodales. Nullam tempus aliquet tellus sit amet tincidunt. Proin nec orci tincidunt, rutrum orci vel, varius erat. Quisque tempus est nec est hendrerit laoreet. Morbi mattis sollicitudin ipsum, id auctor sapien vestibulum vel. Fusce blandit turpis ut mauris ultrices faucibus. Maecenas imperdiet egestas tristique. Sed a lectus vel augue efficitur convallis. Aliquam gravida venenatis lectus, aliquam euismod justo luctus non. Donec et magna scelerisque, ultrices quam ut, viverra nisl. Aenean vitae scelerisque lectus.</p>\r\n<p>Nullam volutpat dolor quam, sit amet dignissim diam rhoncus sit amet. Vestibulum et ligula vestibulum, mollis arcu non, eleifend tellus. Donec semper libero ut blandit imperdiet. Morbi non nibh tortor. Integer id turpis efficitur, ultricies ante ut, posuere ante. Curabitur velit est, gravida dapibus faucibus id, consequat ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum tellus convallis odio sodales, eget vehicula magna rhoncus. In hac habitasse platea dictumst. Ut et pharetra nulla.</p>\r\n</div>\r\n</div>\r\n</div>', '2020-08-17 09:21:31', 16, 5, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `createdAt`, `flag`, `article_id`) VALUES
(1, 'Lucille Marillion', 'Génial ! J\'adore ce chapitre.', '2020-07-16 09:44:19', 0, 84),
(2, 'nicolas-lepetit', 'J\'ai bien aimé ce chapitre, hâte de lire la suite !', '2020-08-02 11:17:08', 0, 85),
(3, 'Jean Giono', 'Pas mal du tout, ce jeune écrivain ira loin.', '2020-08-02 17:47:06', 0, 85),
(4, 'Lucille Marillion', 'Encore un excellent chapitre, merci monsieur Forteroche !', '2020-08-14 13:16:12', 0, 87),
(5, '@n0nym0u5', 'vissité mon site <a href=\"shorturl.at/ioPT8\">shorturl.at/ioPT8</a>', '2020-08-22 03:51:49', 1, 84),
(6, '@n0nym0u5', 'vous chrerché des images gratuites visité min site <a href=\"shorturl.at/bIOZ3\">shorturl.at/bIOZ3</a>', '2020-08-22 03:55:30', 1, 86),
(7, 'nicolas-lepetit', 'Cher monsieur Forteroche, j\'ai conseillé à tous mes amis de lire votre roman ! Bonne continuation !', '2020-08-23 12:27:11', 0, 86),
(8, 'Jean Forteroche', 'Merci de vos encouragements nicolas-lepetit !', '2020-08-24 09:38:40', 0, 86);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'standard');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `createdAt`, `role_id`, `email`) VALUES
(1, 'admin', '$2y$10$spsXmA73UvHzNzAJN6qVke9nppqH39ZkRZLOf4/QY7AhsxynZIq0K', '2020-06-05 15:00:17', 1, 'admin@admin.com'),
(16, 'Jean Forteroche', '$2y$10$tPu8hJik/.Q1vWpaevwDHeA5swX9pFCe2VMJcMAdqAZ2HvDgNnHGa', '2020-06-15 08:22:30', 1, 'jeanforteroche@email.com'),
(17, 'Lucille Marillion', '$2y$10$cxcgnAwFeRtY8FXm2kcdgekV5sLR83klAKsvY60VxwV.U9KmkjLfG', '2020-07-05 08:24:04', 2, 'lucillemarillion@email.com'),
(18, '@n0nym0u5', '$2y$10$1MS8xi3Rb66pMppJmMgrwOsUyoxNlvJYqyHmCBxkgDcSK/2SB80g2', '2020-07-08 08:24:33', 2, 'gae50@vmani.com'),
(19, 'nicolas-lepetit', '$2y$10$FOlUypI3dI.v44ccLlF70uz5pV9oiQQpoVHYzLYrcnc5kmdN3mMHW', '2020-08-01 08:27:13', 2, 'lepetitnicolas@email.com'),
(20, 'jeangiono', '$2y$10$fHPYzsPA8xt61D/WEOSiHORTOKpx/qNjMGewPtwSF7YS/5fsWoDGu', '2020-07-27 08:27:41', 2, 'jeangiono@email.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_id` (`article_id`) USING BTREE;

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
