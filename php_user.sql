--
-- Structure de la table `php_user`
--
DROP TABLE IF EXISTS `php_user`;
CREATE TABLE `php_user` (
`id` int(11) NOT NULL auto_increment,
`login` varchar(50) collate utf8_unicode_ci NOT NULL,
`mdp` varchar(40) collate utf8_unicode_ci NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=3 ;
--
-- Contenu de la table `php_user`
--
INSERT INTO `php_user` (`id`, `login`, `mdp`) VALUES
(1, 'etudiant', MD5('etudiant')),
(2, 'ETUD', MD5('ETUD'));