create database users;
use users;

create table user_cad(
	id INT auto_increment primary KEY,
	username varchar(255) not null,
	login varchar(255) not null,
    senha varchar(255) not null
);

select senha from user_cad where login ='admin@gmail.com';

ALTER TABLE user_cad
    ADD situacao ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo';
