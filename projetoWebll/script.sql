create table usuario (
id serial not null,
login varchar(30) not null unique,
senha varchar(255) not null,
nome varchar(255) not null);

alter table usuario 
add constraint pk_usuario
primary key(id);

insert into usuario(login, senha, nome) values ('krohn','123','Alexandre Krohn');
insert into usuario(login, senha, nome) values ('alexandre','123','Alexandre K.');
