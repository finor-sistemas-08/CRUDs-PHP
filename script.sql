drop database ejemplo1;
create database ejemplo1;
use ejemplo1;
create table empleado(
    ci int(7) PRIMARY KEY,
    nombres varchar(30) not null,
    paterno varchar(30) not null,
    materno varchar(30),
    sueldo float,
    vel_typeo int,
    grado varchar(30),
    tipo char(1) not null
);
insert into empleado(ci,nombres,paterno,materno,sueldo,vel_typeo,grado,tipo)
values(9357548,"Charles","Darwin","",500,null,'Superior','T');
select *from empleado;
