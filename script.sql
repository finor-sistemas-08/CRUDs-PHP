drop database ejemplo1;
create database ejemplo1;
use ejemplo1;
create table planpago(
    id_plan int AUTO_INCREMENT PRIMARY KEY,
    fecha date not null,
    montoTotal float not null,
    plazo varchar(30) not null
);
create table cuota(
    id_cuota int AUTO_INCREMENT not null,
    fecha date not null,
    monto float not null,
    id_plan int not null,
    primary key(id_cuota,id_plan),
    foreign key (id_plan) REFERENCES planPago(id_plan)
);
insert into planpago(fecha,montoTotal,plazo)
values('2021-10-04',8000,'8 años');
insert into cuota(fecha,monto,id_plan)
values('2021-10-05',1000,1);
select *from planpago;
select *from cuota;

update cuota
set fecha = '2021-10-04',
    monto = 500
where id_cuota=5 AND id_plan = 4;