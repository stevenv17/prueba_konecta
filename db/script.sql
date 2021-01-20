create schema konecta_db;
use konecta_db;
create table productos(
	id int(11) auto_increment primary key,
	nombre varchar(128) not null,
    referencia varchar(256) not null,
    precio int not null,
    peso int not null,
    categoria varchar(128) not null,
    stock int not null,
    fecha_creacion date not null,
    fecha_ultima_venta datetime
);

INSERT INTO `konecta_db`.`productos` (`nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha_creacion`, `fecha_ultima_venta`)
VALUES ('camiseta', 'ref1', '1000', '3', 'cat1', '4', '2020-10-01', '2020-12-01 13:10:12');