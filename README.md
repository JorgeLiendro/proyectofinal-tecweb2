#  Sistema de Gestión de Reservas

##  Descripción
Sistema web full-stack desarrollado con **CakePHP 5.3.3** para la gestión de reservas de accesorios.  
Previene conflictos de doble reserva mediante validación automática de solapamientos temporales y ofrece gestión de recursos, roles y usuarios.

---

##  Características principales

-  Autenticación con roles (Cliente / Admin)
-  CRUD completo de reservas con validación de conflictos
-  Catálogo de productos con inventario
-  Multilingüe (ESPAÑOL/INGLÉS)
-  CRUD completo de usuarios, roles y recursos 

---

##  Tecnologías utilizadas

- **Frontend:** Bootstrap 5, HTML, CSS  
- **Backend:** CakePHP 5.3.3, PHP 8.4 (Arquitectura MVC)  
- **Base de datos:** MariaDB  
- **Contenedores:** Podman  

---

##  Estructura del Proyecto

```bash
cakephp-entregablefin/
├── APP_EF/
│   ├── config/
│   ├── logs/
│   ├── plugins/
│   └── resources/
├── src/
│   ├── Controller/
│   │   ├── Cell/
│   │   ├── DetalleReservas/
│   │   ├── Email/
│   │   ├── Layout/
│   │   ├── Pages/
│   │   ├── RecursosController.php
│   │   ├── ReservasController.php
│   │   ├── RolesController.php
│   │   └── UsersController.php
│   ├── Model/
│   │   ├── cell/
│   │   ├── DetalleReservasTable.php
│   │   ├── RecursosTable.php
│   │   ├── ReservasTable.php
│   │   ├── RolesTable.php
│   │   └── UsersTable.php
│   ├── templates/
│   │   ├── cell/
│   │   ├── DetalleReservas/
│   │   ├── email/
│   │   ├── layout/
│   │   ├── Pages/
│   │   ├── recursos/
│   │   ├── reservas/
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
```

---

## ⚙️ Instalación del proyecto

### 1️⃣ Clonar el repositorio
```bash
git clone https://github.com/JorgeLiendro/proyectofinal-tecweb2.git
```

### 2️⃣ Entrar al proyecto
```bash
cd proyectofinal-tecweb2
```

### 3️⃣ Instalar dependencias
```bash
composer install
```

### 4️⃣ Configurar entorno de Base de datos
- Copiar el archivo:
```bash
cp config/app_local.example.php config/app_local.php
```
- Configurar la conexión a la base de datos en `app_local.php`

### 5️⃣ Ejecutar el servidor
```bash
bin/cake server -p 8765
```
-Abrir en el navegador: http://localhost:8765

---
### Despliegue con PODMAN
1. Crear carpeta
- mkdir devops
- cd devops
2. Clonar Proyecto dentro de /devops
```bash
git clone https://github.com/JorgeLiendro/proyectofinal-tecweb2.git
```
3. Dentro de devops crear archivos: dockerfile y compose.yml

Dockerfile
```bash
# Dockerfile CakePHP listo para Podman y DebugKit
FROM php:8.4-apache-bullseye

# Evitar interacción al instalar paquetes
ENV DEBIAN_FRONTEND=noninteractive

# Forzar HTTPS en repositorios y actualizar apt
RUN sed -i 's|http://deb.debian.org|https://deb.debian.org|g' /etc/apt/sources.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends \
        libicu-dev \
        libonig-dev \
        libsqlite3-dev \
        unzip \
        git \
        curl \
    && docker-php-ext-install intl mbstring pdo pdo_mysql mysqli pdo_sqlite \
    && docker-php-ext-enable intl mbstring pdo pdo_mysql mysqli pdo_sqlite \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copiar código de la aplicación
COPY proyectofinal-tecweb2/ /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Instalar Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar DebugKit automáticamente
RUN cd /var/www/html && composer require --dev cakephp/debug_kit

# Exponer puerto 80
EXPOSE 80

# Comando por defecto para Apache
CMD ["apache2-foreground"]
```
compose.yml
```bash
services:
  php-app:
    image: proyectofinal-tecweb2
    container_name: proyectofinal-tecweb2
    ports:
      - "8080:80"
    restart: unless-stopped
```
4.Construir imagen
```bash
podman build -t app_ef .
```
5. Ejecutar contenedor
```bash
podman-compose up
```
6. Acceder
http://localhost:8080

Comandos útiles para podman
- Listar imágenes descargadas
```bash
podman images
```
- Eliminar una imagen
```bash
podman rmi nombre_imagen
```
- Construir una imagen desde un dockerfile
```bash
podman build -t nombre_imagen .
```
- Listar contenedores en ejecución
```bash
podman ps
```
- Listar todos (incluye detenidos)
```bash
podman ps -a
```
- Detener un contenedor
```bash
podman stop nombre_contenedor
```
- Iniciar un contenedor detenido
```bash
podman start nombre_contenedor
```
- Reiniciar un contenedor
```bash
podman restart nombre_contenedor
```
- Eliminar un contenedor
```bash
podman rm nombre_contenedor
```
- Levantar servicios
```bash
podman-compose up -d
```
- Detener servicios
```bash
podman-compose down
```
- Ver logs
```bash
podman-compose logs
```
- Reconstruir contenedores
```bash
podman-compose up --build
```


##  Autor
- Jorge Liendro
- Proyecto desarrollado para la materia Tecnología Web II
