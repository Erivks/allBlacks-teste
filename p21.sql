CREATE DATABASE `p21`;

USE `p21`;

CREATE TABLE `torcedores` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(200) NOT NULL COLLATE 'utf8_general_ci',
	`documento` VARCHAR(25) NOT NULL COLLATE 'utf8_general_ci',
	`cep` VARCHAR(10) NOT NULL COLLATE 'utf8_general_ci',
	`endereco` VARCHAR(250) NOT NULL COLLATE 'utf8_general_ci',
	`bairro` VARCHAR(200) NOT NULL COLLATE 'utf8_general_ci',
	`cidade` VARCHAR(125) NOT NULL COLLATE 'utf8_general_ci',
	`uf` CHAR(2) NOT NULL COLLATE 'utf8_general_ci',
	`telefone` VARCHAR(25) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(200) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`ativo` CHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=MyISAM
;
