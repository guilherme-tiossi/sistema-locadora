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
  `id_genero` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `genero` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genero`)
);

CREATE TABLE `tbfilmes`(
    `id_filme` int(11) NOT NULL AUTO_INCREMENT,
    `titulo_filme` varchar(100) NOT NULL,
    `id_genero` int(11) NOT NULL,
    PRIMARY KEY (`id_filme`),
    KEY `fk_idgenero` (`id_genero`),
    CONSTRAINT `fk_idgenero` FOREIGN KEY (`id_genero`) REFERENCES `tbgeneros` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE
);

insert into tbgeneros (genero) values
('Comédia'),
('Terror'),
('Aventura'),
('Comédia Romântica'),
('Slasher'),
('Western'),
('Suspense'),
('Drama'),
('Policial'),
('Comédia Dramática'),
('Humor Negro'),
('Ação'),
('Suspense Romântico'),
('Drama Policial');

insert into tbfilmes (titulo_filme, id_genero) values
('Django Livre', 6),
('Bastardos Inglórios', 10),
('Hostel', 2),
('Sin City', 9),
('Kill Bill', 8),
('Little Nicky', 1),
('Jackie Brown', 9),
('Curdled', 7),
('From Dusk Till Dawn', 12),
('Girl 6', 13),
('The Rock', 12),
('Maré Vermelha',  8),
('Destiny Turns on the Radio', 12),
('Desesperado', 6),
('Four Rooms', 11),
('Natural Born Killers', 10),
('Pulp Fiction', 14),
('Amor à Queima-Roupa', 9),
('Reservoir Dogs', 8),
('Past Midnight', 7),
('Os Oito Odiados', 6);

insert into tbusuarios (nome_user, email_user, senha_user, adm) values 
('Renato Pereira', 'renatopereira@email.com', 'senharenato', '2'),
('Bernardo Tavares', 'bernardotavares@email.com', 'senhabernardo', '1'),
('Cristiane Santos', 'cristianesantos@email.com', 'senhacristiane', '1'),
('Carlos Alberto', 'carlosalberto@email.com', 'senhacarlos', '0'),
('Marcia Aparecida', 'marciaaparecida@email.com', 'senhamarcia', '0'),
('Yasmin Tiossi', 'yasmintiossi@email.com', 'senhayasmin', '0'),
('Rafaela Messias', 'rafaelamessias@email.com', 'senharafaela', '0');
