# Registro Productos Konecta
***
Este es un pequeño proyecto desarrollado en php nativo y bases de datos mySQL, utiliza el MVC para crear, modificar, mostrar y eliminar productos, además puede vender cada producto y actualizar las existencias del mismo en un stock y la fecha de la última venta.

## Tecnologias usadas en el proyecto

* [php](https://www.php.net/): Version 7.3.27
* [mySQL](https://www.mysql.com/): Version 10.4.17-MariaDB
* [XAMPP](https://www.apachefriends.org/): Version: Apache/2.4.46 (Win64) OpenSSL/1.1.1h PHP/7.3.27
* [bootstrap](https://getbootstrap.com/): version: 5.0

### Estructura
***
Este proyecto usa el patrón de desarrollo MVC por lo cual cuenta con 3 carpetas: Controller, Model, View.

En la carpeta Controller hay un archivo controller.php  con la clase controller, con todas las funciones del CRUD.

En la carpeta Model hay tres archivos, para realizar la conexión a la base de datos => conexion.php, crud.php donde se encuentran las funciones para realizar las operaciones a la base de datos, recibiendo parámentros del controlador y el archivo  rutasModel.php para generar rutas de redireccionamiento de acuerdo al valor de variables GET.

En la Carpeta View están todas las vistas del proyecto, el index.php es la vista principal, además la app está modularizada para requerir una vez en un archivo de la vista template.php, cada modulo para mostrarse adentro usando la funcion rutasController del controlador teniendo en cuenta el valor de las peticiones GET.

Esta app usa PDO php para la interación con la base de datos.

#### .htaccess

La app cuenta con el fichero .htaccess para evitar que el usario vea el contenido de las urls y así crear urls amigables 

#### Bases de datos

Host: localhost
dbname: Konecta
user: root
password: 

table: Producto

Script creación base de datos y tabla (scriptKonecta.txt)

## Cristopher Ortega