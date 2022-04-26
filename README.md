<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# CRUD - TEST

CRUD realizado en laravel para la gestion de entradas de actividades, el objeto entry es el principal y cuenta con la siguiente estructura. 

```bash
{ 
    'name':VALUE,
    'title': ...,
    'text': ...,
    'date': ...
    'user_id': ...,
}
```

## Comenzando 🚀
```bash
git clone https://github.com/SebastianHidalgo95/CRUD-test

```
### Moverse al directorio del proyecto

```bash
cd CRUD-test
```

### Descargar Dependencias del Proyecto

Como las dependencias del proyecto las maneja **composer** debemos ejecutar el comando:
En este caso se instalaron usando composer 1.9.0

```bash
composer install
```
### Información 📋

_Que cosas necesitas para instalar el software y como instalarlas_

```
    Backend
        - php ^7.31 
        - Laravel ^8.75
        
        Important packages

        -jenssegers/mongodb for connection and relationships with mongo
        -jeroennoten/laravel-adminlte for administration panel
        -laravel/ui - for authentication 
        -realrashid/sweet-alert - alerts management with swal
        -bootstrap - for design

    Database     
        - MongodDB - for entries table
        - postreSQL - for users table
```

### Configurar Entorno

La configuración del entorno se hace en el archivo **.env** pero esé archivo no se puede versionar según las restricciones del archivo **.gitignore**, igualmente en el proyecto hay un archivo de ejemplo  **.env.example** debemos copiarlo con el siguiente comando:

```bash
cp .env.example .env
```

Luego es necesario modificar los valores de las variables de entorno para adecuar la configuración a nuestro entorno de desarrollo, por ejemplo los parámetros de conexión a la base de datos.

### Configurar la Conexión con la base de datos

Vaya a la raiz de su proyecto y busque el archivo .env debe configurar las variables segun su conexion en el ejemplo utilizando xampp
La base de datos que debe tener creada en su conexión con mysql debe ser tener el nombre 'db_crud_test' para este caso particular de postgresql y 'db_crud_mongo' para mongodb

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db_crud_test
DB_USERNAME=postgres
DB_PASSWORD=root

MONGO_DB_HOST=127.0.0.1
MONGO_DB_PORT=27017
MONGO_DB_DATABASE=db_crud_mongo
MONGO_DB_USERNAME=
MONGO_DB_PASSWORD=
```

### Migrar la Base de Datos

el proyecto ya tiene los modelos, migraciones. Entonces lo único que nos hace falta es ejecutar la migración y ejecutar el siguiente comando:

```bash
php artisan migrate:fresh
```

### Instalar modulos de npm

Los paquetes utilizados para el frontend se instalan utilizando npm o yarn 

```bash
npm install
```
### Lanzar por primera vez
Para realizar el primer lanzamiento debe tener su servidor corriendo para el backend, ya sea utilizando composer serve o xampp, tambien debe generar los archivos js mediante el comando

```bash
npm run dev
``` 