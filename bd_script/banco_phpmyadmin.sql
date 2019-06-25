SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE TABLE IF NOT EXISTS `clube` (
  `id_clube` INT(11) NOT NULL,
  `nome_clube` VARCHAR(50) NULL DEFAULT NULL,
  `escudo` VARCHAR(50) NULL DEFAULT NULL,
  `desafiado` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id_clube`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `jogadores` (
  `id_jogadores` INT(11) NOT NULL,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `foto` VARCHAR(45) NULL DEFAULT NULL,
  `habilidade` VARCHAR(45) NULL DEFAULT NULL,
  `raca` VARCHAR(45) NULL DEFAULT NULL,
  `capacidade_fisica` VARCHAR(45) NULL DEFAULT NULL,
  `clube_id_clube` INT(11) NOT NULL,
  PRIMARY KEY (`id_jogadores`),
  INDEX `fk_jogadores_clube_idx` (`clube_id_clube` ASC),
  CONSTRAINT `fk_jogadores_clube`
    FOREIGN KEY (`clube_id_clube`)
    REFERENCES `clube` (`id_clube`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO clube
(id_clube, nome_clube, escudo, desafiado)
VALUES
("0", "Brasil", "imagens/brasil.png", ""),
("1", "Argentina", "imagens/argentina.png", ""),
("2", "Chile", "imagens/chile.png", ""),
("3", "Uruguai", "imagens/uruguai.png", "");

INSERT INTO jogadores
(id_jogadores, clube_id_clube, nome, foto, habilidade, raca, capacidade_fisica)
VALUES
("0", "0","Neymar Jr", "imagens/neymar_jr.jpg", "79", "70", "47"),
("1", "0","Alisson Becker", "imagens/alisson_becker.jpg", "99","56", "68"),
("2", "0","Philippe Coutinho", "philippe_coutinho.jpg","50", "87", "69"),
("3", "0","Everton Sousa", "imagens/everto_sousa.jpg", "60", "57", "59"),
("4", "1","Lionel Messi", "imagens/lionel_messi.jpg", "90", "42", "88"),
("5", "1","Angel Di Maria", "imagens/angel_di_maria.jpg", "49","73", "93"),
("6", "1","Sergio Aguero", "imagens/sergio_aguero.jpg", "94", "52", "64"),
("7", "1","Paulo Dybala", "imagens/paulo_dybala.jpg", "95", "51", "40"),
("8", "2","Alexi Sanchez", "imagens/alexi_sanchez.jpg", "78", "89", "67"),
("9", "2","Arturo Vidal", "imagens/arturo_vidal.jpg", "65","97", "66"),
("10", "2","Gabriel Arias", "imagens/gabriel_arias.jpg", "81", "76", "96"),
("11", "2","Eduardo Vargas", "imagens/eduardo_arias.jpg", "86", "85", "100"),
("12", "3","Luis Suarez", "imagens/luis_suarez.jpg", "63", "98", "91"),
("13", "3","Diego Godin", "imagens/diego_godin.jpg","72", "55", "58"),
("14", "3","Edinson Cavani", "imagens/edinson_cavani.jpg", "43", "75", "71"),
("15", "3","Fernando Muslera", "imagens/fernando_muslera.jpg", "74", "61", "46");