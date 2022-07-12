drop database if exists crud;
create database crud;
use crud;

CREATE TABLE `tbusuarios` (
 `id_user` int(11) NOT NULL AUTO_INCREMENT,
 `nome_user` varchar(100) NOT NULL,
 `email_user` varchar(100) NOT NULL,
 `senha_user` varchar(100) NOT NULL,
 `adm` tinyint(1) NOT NULL,
 PRIMARY KEY (`id_user`),
 UNIQUE KEY `email_user` (`email_user`)
);

CREATE TABLE `tbgeneros` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genero`)
);

CREATE TABLE `tbfilmes`(
    `id_filme` int(11) NOT NULL AUTO_INCREMENT,
    `titulo_filme` varchar(100) NOT NULL,
    `idgenero` int(11) NOT NULL,
    PRIMARY KEY (`id_filme`),
    KEY `fk_idgenero` (`idgenero`),
    CONSTRAINT `fk_idgenero` FOREIGN KEY (`idgenero`) REFERENCES `tbgeneros` (`id_genero`)
);

insert into tbusuarios (nome_user, email_user, senha_user, adm) values ('Renato Pereira', 'renatopereira@email.com', 'senharenato', '1'); 