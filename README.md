Sistema de Gestión de Reservas 

Descripción
Sistema web full-stack desarrollado con CakePHP 5.3.3 para la gestión de reservas de accesorios . Previene conflictos de doble reserva mediante validación automática de solapamientos temporales y ofrece gestión de recursos, roles y usuarios.

Características principales:

Autenticación con roles (Cliente/Admin)

CRUD completo de reservas con validación de conflictos

Catálogo de productos con inventario

Multilingüe (ES/EN)

CRUD completo de usuarios, roles y recursos(productos)

Tecnologías utilizadas
Frontend: Bootstrap 5, HTML, CSS.
Backend: CakePHP 5.3.3, PHP 8.4, Patrón de arquitectura MVC
Base de datos: MariaDB
Contenedores: Podman

Estructura del Proyecto

cakephp-entregablefin/
├── **APP_EF/**                    
│   ├── config/
│   ├── logs/
│   ├── plugins/
│   └── resources/
├── src/
│   ├── **Controller/**        
│   │   ├── Cell/
│   │   ├── DetalleReservas/
│   │   ├── Email/
│   │   ├── Layout/
│   │   ├── Pages/
│   │   ├── **RecursosController.php**
│   │   ├── **ReservasController.php**     
│   │   ├── RolesController.php
│   │   └── UsersController.php
│   ├── **Model/**              
│   │   ├── cell/
│   │   ├── **DetalleReservasTable.php**
│   │   ├── **RecursosTable.php**
│   │   ├── **ReservasTable.php**        
│   │   ├── RolesTable.php
│   │   └── **UsersTable.php**
│   ├── **templates/**          
│   │   ├── cell/
│   │   ├── **DetalleReservas/**
│   │   ├── email/
│   │   ├── **layout/**
│   │   ├── Pages/
│   │   ├── **recursos/**
│   │   ├── **reservas/**             
│   │   │   ├── add.ctp
│   │   │   ├── edit.ctp
│   │   │   ├── index.ctp              
│   │   │   └── view.ctp
│   │   ├── Roles/
│   │   └── users/
│   ├── tests/
│   └── tmp/
├── APP/
├── vendor/
├── webroot/
├── composer.json
└── index.php


Instalación del proyecto
- Clonar el proyecto:
git clone https://github.com/JorgeLiendro/proyectofinal-tecweb2.git
