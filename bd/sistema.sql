-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jan-2020 às 19:28
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

create database sistema;
use sistema;

CREATE TABLE relatores (
  id_relator int(11) NOT NULL auto_increment,
  nome varchar(100) NOT NULL,
  cpf varchar(100) NOT NULL unique,
  camara int(1) NOT NULL,
  primary key (id_relator)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE usuarios (
  id_usuarios int(11) NOT NULL auto_increment,
  nome varchar(100) NOT NULL,
  usuario varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  senha varchar(100) NOT NULL,
  dataCaptura date NOT NULL,
  camara int(1) not null,
  primary key (id_usuarios,usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table processos (
  id_processos int(11) NOT NULL auto_increment,
  nrofa varchar(100) NOT NULL,
  consumidor varchar(100) NOT NULL,
  fornecedor varchar(150) NOT NULL,
  relator varchar(100) NOT NULL,
  ValorGrau_1 varchar(100) NOT NULL,
  ValorGrau_2 float(10,2) NOT NULL,
  data_jugamento date NOT NULL,
  ano int(11) NOT NULL,
  recurso varchar(100) NOT NULL,
  camara int(1) not null,
  primary key (id_processos)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;