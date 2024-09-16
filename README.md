# Task Management API - Laravel

Este proyecto es una API REST para la gestión de tareas. Permite a los usuarios registrarse, iniciar sesión y realizar CRUD (Crear, Leer, Actualizar, Eliminar) de notas/tareas. Además, las tareas pueden cambiar su estado entre `pending`, `progreso` y `hecho`.

## Table of Contents 📝
- [About the Project 📁](#about-the-project-📁)
- [Local Installation Option ⚙️](#local-installation-option-⚙️)
- [Stack](#stack)
- [Endpoints ⚙️](#endpoints-⚙️)
-  [Deploy 🚀](#deploy-🚀)
- [Author ✒️](#author-✒️)
- [Thanks 🎓](#thanks-🎓)

## Características

- **Registro de usuario**: Los usuarios pueden registrarse con su email y contraseña.
- **Autenticación**: Los usuarios pueden iniciar sesión y obtener un token de autenticación para realizar operaciones.
- **Gestión de tareas**: Los usuarios pueden crear, leer, actualizar y eliminar tareas.
- **Estados de tareas**: Cada tarea puede tener un estado: `pending`, `progreso`, `hecho`.
- **Protección por autenticación**: Solo los usuarios autenticados pueden gestionar sus tareas.

## Requisitos

- PHP 8.2
- Composer
- Laravel 9.x
- MySQL o cualquier base de datos compatible con Laravel
- [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum) para la autenticación 
## Instalación