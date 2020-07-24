CREATE TABLE `post`(

`id` int(11)NOT NULL,

`title` varchar(100)NOT NULL,

`content` text NOT NULL,

`author` varchar(100)NOT NULL,

`createdAt` datetime NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `post`(`id`, `title`, `content`, `author`, `createdAt`)VALUES

(1, 'Voici mon premier article','Mon super blog est en construction', 'Sophie', '2019-03-15 08:10:24'),

(2, 'Un deuxième article', 'Je continue à ajouter du contenu sur mon blog.', 'Sophie', '2019-03-16 13:27:38'),

(3, 'Mon troisième article','Mon blog est génial!!!', 'Sophie', '2019-03-16 14:45/57');

ALTER TABLE `post`

ADD PRIMARY KEY(`id`);

ALTER TABLE `post`

MODIFY `id` int(11)NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;