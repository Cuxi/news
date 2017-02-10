# news

Instalación

Para esta aplicación necesitamos el uso de:

-MySQL

-Apache

Desarrollo

La aplicación necesitará una base de datos en mysql donde haya un database llamando news, junto con una tabla con el mismo nombre. La tabla se creará de la siguiente manera:

CREATE TABLE news(
id int(3) not null auto_increment,
title varchar(100) not null,
slug varchar(300) not null,
text varchar(1000) not null,
primary key (id)
);


Copiamos el proyecto en /var/www/html, y lo llamamos con localhost/news/index.php/news. Con esta ruta se mosntratán las noticias que haya actualmente en la base de datos. Veréis en application/config/routes.php configuradas el resto de las rutas para poder ejecutar la aplicación. 
