CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `article` (

                           `id` int(11) NOT NULL,

                           `title` varchar(100) NOT NULL,

                           `content` text NOT NULL,

                           `author` varchar(100) NOT NULL,

                           `createdAt` datetime NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comment` (`id`, `title`, `content`, `author`, `createdAt`) VALUES
(1, 'Title', 'Content', 'Author' ,'1970-01-01 12:00:00');

ALTER TABLE `article`

    ADD PRIMARY KEY (`id`);

ALTER TABLE `article`

    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

CREATE TABLE `comment` (
                           `id` int(11) NOT NULL,
                           `pseudo` varchar(100) NOT NULL,
                           `content` text NOT NULL,
                           `createdAt` datetime NOT NULL,
                           `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comment` (`id`, `pseudo`, `content`, `createdAt`, `article_id`) VALUES
(1, 'Pseudo', 'Commentaire', '1970-01-01 12:00:00', 1);

ALTER TABLE `comment`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_article_id` (`article_id`);

ALTER TABLE `comment`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `comment`
    ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `pseudo` varchar(100) NOT NULL,
                        `password` varchar(60) NOT NULL,
                        `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `role` (
                        `id` int(11) NOT NULL,
                        `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

ALTER TABLE `role`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `role`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `user`
    ADD COLUMN `role_id` int(11) NOT NULL;

ALTER TABLE `user`
    ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

ALTER TABLE `article`
    ADD COLUMN `order` int(11) NOT NULL;

ALTER TABLE `article`
    ADD `published` TINYINT(1) NOT NULL DEFAULT '0';

ALTER TABLE `article`
    ADD `lastPublishedDate` DATETIME NOT NULL;

ALTER TABLE `user`
    ADD `email` VARCHAR(255) NOT NULL;

