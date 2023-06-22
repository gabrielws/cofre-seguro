-- MySQL Script generated by MySQL Workbench
-- Wed Jun 21 21:50:20 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cofre-seguro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cofre-seguro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cofre-seguro` DEFAULT CHARACTER SET utf8 ;
USE `cofre-seguro` ;

-- -----------------------------------------------------
-- Table `cofre-seguro`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cofre-seguro`.`Usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nivel` INT NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cofre-seguro`.`Senhas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cofre-seguro`.`Senhas` (
  `idSenha` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `nome` VARCHAR(48) NOT NULL,
  `senha` VARCHAR(24) NOT NULL,
  `site` VARCHAR(14) NOT NULL,
  `url` VARCHAR(48) NULL,
  PRIMARY KEY (`idSenha`),
  INDEX `fk_Senhas_Usuarios_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Senhas_Usuarios`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `cofre-seguro`.`Usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cofre-seguro`.`Notas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cofre-seguro`.`Notas` (
  `idNota` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `nome` VARCHAR(24) NOT NULL,
  `conteudo` VARCHAR(2048) NOT NULL,
  PRIMARY KEY (`idNota`),
  INDEX `fk_Notas_Usuarios1_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Notas_Usuarios1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `cofre-seguro`.`Usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cofre-seguro`.`Tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cofre-seguro`.`Tipos` (
  `idTipo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cofre-seguro`.`DadosPessoais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cofre-seguro`.`DadosPessoais` (
  `idDadoPessoal` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `idTipo` INT NOT NULL,
  `nome` VARCHAR(24) NOT NULL,
  `conteudo` VARCHAR(48) NOT NULL,
  PRIMARY KEY (`idDadoPessoal`),
  INDEX `fk_DadosPessoais_Usuarios1_idx` (`idUsuario` ASC) VISIBLE,
  INDEX `fk_DadosPessoais_Tipos1_idx` (`idTipo` ASC) VISIBLE,
  CONSTRAINT `fk_DadosPessoais_Usuarios1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `cofre-seguro`.`Usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DadosPessoais_Tipos1`
    FOREIGN KEY (`idTipo`)
    REFERENCES `cofre-seguro`.`Tipos` (`idTipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


insert into usuarios (nome, sobrenome, email, telefone, senha, nivel) VALUES ('Nome', 'Sobrenome', 'admin@admin.com', '111111111', 'admin', 3);
insert into usuarios (nome, sobrenome, email, telefone, senha, nivel) VALUES ('João', 'Sobrenome', 'joao@email.com', '11111111', 'teste', 1);
insert into usuarios (nome, sobrenome, email, telefone, senha, nivel) VALUES ('Maria', 'Sobrenome', 'maria@email.com', '111111111', 'teste', 1);

insert into senhas (idUsuario, nome, senha, site, url) VALUES (1, 'Facebook', '123456', 'facebook.com', 'https://www.facebook.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (1, 'Instagram', '123456', 'instagram.com', 'https://www.instagram.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (1, 'Twitter', '123456', 'twitter.com', 'https://twitter.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (1, 'Gmail', '123456', 'gmail.com', 'https://mail.google.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (1, 'Outlook', '123456', 'outlook.com', 'https://outlook.live.com/owa/');

insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Facebook', '123456', 'facebook.com', 'https://www.facebook.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Instagram', '123456', 'instagram.com', 'https://www.instagram.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Twitter', '123456', 'twitter.com', 'https://twitter.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Gmail', '123456', 'gmail.com', 'https://mail.google.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Outlook', '123456', 'outlook.com', 'https://outlook.live.com/owa/');


insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Facebook', '123456', 'facebook.com', 'https://www.facebook.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Instagram', '123456', 'instagram.com', 'https://www.instagram.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Twitter', '123456', 'twitter.com', 'https://twitter.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Gmail', '123456', 'gmail.com', 'https://mail.google.com/');
insert into senhas (idUsuario, nome, senha, site, url) VALUES (2, 'Outlook', '123456', 'outlook.com', 'https://outlook.live.com/owa/');



insert into notas (idUsuario, nome, conteudo) values (1, 'Notas1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl vel ultricies lacinia, nunc nisl ultricies nisl, eget ultricies nu');
insert into notas (idUsuario, nome, conteudo) values (2, 'Notas2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl vel ultricies lacinia, nunc nisl ultricies nisl, eget ultricies nu');
insert into notas (idUsuario, nome, conteudo) values (3, 'Notas3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl vel ultricies lacinia, nunc nisl ultricies nisl, eget ultricies nu');


insert into tipos (nome) values ('Email');
insert into tipos (nome) values ('Telefone');
insert into tipos (nome) values ('Endereço');
insert into tipos (nome) values ('CPF');
insert into tipos (nome) values ('RG');
insert into tipos (nome) values ('Outros');


insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (1, 1, 'Email', 'email@email.com');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (1, 2, 'Telefone', '123456789');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (1, 3, 'Endereço', 'Rua 1, 123');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (1, 4, 'CPF', '123456789');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (1, 5, 'RG', '123456789');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (1, 6, 'Outros', 'Outros');


insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (2, 1, 'Email', 'email@email.com');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (2, 2, 'Telefone', '987654321');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (2, 3, 'Endereço', 'Rua 2, 234');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (2, 4, 'CPF', '987654321');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (2, 5, 'RG', '987654321');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (2, 6, 'Outros', 'Outros');


insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (3, 1, 'Email', 'email@email.com');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (3, 2, 'Telefone', '789456123');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (3, 3, 'Endereço', 'Rua 3, 343');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (3, 4, 'CPF', '789456123');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (3, 5, 'RG', '789456123');
insert into dadosPessoais (idUsuario, idTipo, nome, conteudo) values (3, 6, 'Outros', 'Outros');