drop database ejemplo1;
create database ejemplo1;
use ejemplo1;
create table materia(
    sigla char(6) PRIMARY KEY,
    nombre varchar(30) not null
);
create table prerequisito(
    sigla char(6) not null,
    preReq char(6) not null,
    PRIMARY KEY(sigla,preReq),
    FOREIGN KEY (sigla) REFERENCES materia(sigla),
    FOREIGN KEY (preReq) REFERENCES materia(sigla)
);
insert into materia(sigla,nombre)
values('MAT101','Cálculo 1');
insert into materia(sigla,nombre)
values('MAT110','Cálculo 2');
insert into prerequisito(sigla,preReq)
values('MAT110','MAT101');
select *from materia;
select *from prerequisito;

delete from materia
where sigla='$this->sigla' and preReq='$this->preReq'

update prerequisito
set 'ABC',
    '$this->preReq'
where sigla='$this->sigla' and preReq='$this->preReq