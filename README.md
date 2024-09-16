# Task Management API - Laravel

Este proyecto es una API REST para la gestión de tareas. Permite a los usuarios registrarse, iniciar sesión y realizar CRUD (Crear, Leer, Actualizar, Eliminar) de notas/tareas. Además, las tareas pueden cambiar su estado entre `pending`, `progreso` y `hecho`.

## Table of Contents 📝
- [Task Management](#Task-Management)
- [Características](#Características)
- [Stack](#stack)
- [Clonación y Configuración del Proyecto](#Clonación-y-Configuración-del-Proyecto)
- [Endpoints](#Endpoints)
-  [Deploy ](#deploy)
- [Autores ](#Autores)
- [Agradecimiento ](#thanks)

## Características

- **Registro de usuario**: Los usuarios pueden registrarse con su email y contraseña.
- **Autenticación**: Los usuarios pueden iniciar sesión y obtener un token de autenticación para realizar operaciones.
- **Gestión de tareas**: Los usuarios pueden crear, leer, actualizar y eliminar tareas.
- **Estados de tareas**: Cada tarea puede tener un estado: `pending`, `progreso`, `hecho`.
- **Protección por autenticación**: Solo los usuarios autenticados pueden gestionar sus tareas.

## Stack
Tecnologías utilizadas para el proyecto:

<div align="center">

<a href="https://www.php.net/">
    <img src="https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
</a>

<a href="https://laravel.com/">
    <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
</a>

<a href="https://www.mysql.com/">
    <img src="https://img.shields.io/badge/mysql-%234479A1.svg?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</a>

<a href="https://getbootstrap.com/">
    <img src="https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
</a>

<a href="https://www.docker.com/">
    <img src="https://img.shields.io/badge/docker-%232496ED.svg?style=for-the-badge&logo=docker&logoColor=white" alt="Docker">
</a>


</div>

## Requisitos

- PHP 8.2
- Composer
- Laravel 9.x
- MySQL o cualquier base de datos compatible con Laravel
- [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum) para la autenticación

## Instalación

### Clonación y Configuración del Proyecto

1. Clona el repositorio desde GitHub y navega al directorio del proyecto:

   ```bash
   git clone https://github.com/AbrahamEsc1911/API-REST-PHP-TASK-APP.git
   cd API-REST-PHP-TASK-APP


2. Instala las dependencias del proyecto, copia el archivo de entorno y configura la base de datos:
 
 composer install
 cp .env.example .env

3. Edita el archivo .env para configurar los detalles de conexión a la base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña


4. Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

php artisan migrate

5. Ejecuta los seeders para insertar datos de prueba:

php artisan db:seed


6. Finalmente, ejecuta el servidor local para comenzar a usar la aplicación:
 php artisan serve


## Endpoints⚙️

## Autenticación
<li> Registro: POST /api/register
<li> Login: POST /api/login
<li>Logout (requiere autenticación): POST /api/logout

## Gestión de Usuarios
<li>Listar todos los usuarios: GET /api/users
<li>Obtener un usuario por ID: GET /api/users/{id}
<li>Actualizar datos de un usuario: PUT /api/users/{id}
<li>Eliminar un usuario: DELETE /api/users/{id?}

##  Tareas
<li>Listar todas las tareas: GET /api/tasks
<li>Crear una nueva tarea: POST /api/tasks
<li>Mostrar una tarea específica: GET /api/tasks/{id}
<li>Actualizar una tarea: PUT /api/tasks/{id}
<li>Eliminar una tarea: DELETE /api/tasks/{id}
<li>Cambiar el estado de una tarea: /api/tasks/{id}/status

## Estados de las tareas
<li>pending: Tarea pendiente.
<li>progreso: Tarea en progreso.
<li>hecho: Tarea completada.


## Deploy 🚀
Deploy via Zeabur: [https://PHPTASKAPP.zeabur.zeabur.app/](https://PHPTASKAPP.zeabur.zeabur.app/) <br>

## Autores ✒️

- Abraham Escobar
- Tatiana Ortiz

## Agradecimiento 🎓

Muchas gracias a la Geekshubs Academy por la oportunidad de aprender y crecer como desarrollador, cada día mejoras más.