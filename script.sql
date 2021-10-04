drop database ejemplo1;
create database ejemplo1;

use ejemplo1;
create table persona(
id_persona int(10) AUTO_INCREMENT PRIMARY KEY,
nombre varchar(30),
edad int
);

insert into persona(nombre,edad) values("Charles",10);

select *from persona;
