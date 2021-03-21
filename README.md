<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Technical Test

This technical test consists of:

Indicaciones:
    ‣ Hola y bienvenido a la prueba técnica. Para esta prueba, necesitamos que
    crees un nuevo entorno de Laravel.
    ‣ Debes crear migraciones para la base de datos, añadiendo usuarios y roles.
    Un usuario puede tener varios roles.
    ‣ Debes crear un comando que añada un usuario específico a la base de datos,
    pasándole nombre y contraseña. Ese usuario debe poder loguearse.
    ‣ Debes crear los modelos, y los controladores para generar un CRUD que
    gestione esos roles. Se debe poder crear roles, añadir roles a un usuario, o
    quitárselos, mediante un sistema de vistas basado en blade.
    ‣ Debes enviarnos acceso a un repositorio git a tu elección y tenerlo dispuesto
    para ser ejecutado en docker.

Plus:
    ‣ + enviar correo al mail del usuario tras crear su cuenta
    ‣ + añadir tabla de permisos, pudiendo añadir varios permisos al mismo rol.
    ‣ + uso de react
    ‣ + api endpoint que devuelva en json todos los roles.

Tiempo de entrega:
‣ ASAP


## Install

This project is supported in Docker.
To deploy this in your local enviroment, follow this steps:

1) Clone the repo

2) Go to root folder of the project

3) Assuming you have Docker installed and properly configured, go to a terminal and execute: docker-compose up --build

4) The first time, database will be empty. To make migrations and seed the database, open another terminal in project's root and execute: docker-compose exec app php artisan migrate:refresh --seed  

5) Open a browser and go to localhost:8990 to see the app


## Use

Initial User) When seeding, a initial user with admin role is created. Credentials are admin@rruger.dev (password: 123456)

General App) The interface is quite self-intuitive. Once logged in, depending on the permissions of the role that your user has, you will be able to perform more or fewer actions.

The actions are grouped in:

- User CRUD
- Roles CRUD
- Manage permissions through roles


Command) You can create a user using: docker-compose exec app php artisan make:user (no arguments needed, command will ask for the neccesarry arguments) 

API Endpoint) Roles can be fetched calling localhost:8990/api/roles

Email) I used mailtrap.io to simulate an email service. You can change my mailtrap.io credentials editing .env.prod (MAIL_USERNAME MAIL_PASSWORD) and rebuilding

![Alt text](./emailing.png?raw=true "Emails sended by this app")



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
