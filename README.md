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
- Configurar la conexión a la base de datos en `app_local.php`
```bash
cp  config/app_local.php
```
-En este proyecto, ejecutar en phpmyadmin la BD que esta en el archivo db_ef.sql(usuario admin y cliente ingresan por correo, su password es 123 para ambos)

### 5️⃣ Ejecutar el servidor
```bash
bin/cake server -p 8765
```
-Abrir en el navegador: http://localhost:8765

---
### Despliegue con PODMAN (Objetivo de este GitHub)
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
FROM php:8.4-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/webroot

# Dependencias del sistema + extensiones PHP
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        git unzip curl \
        libzip-dev libonig-dev libpng-dev libicu-dev zlib1g-dev libxml2-dev; \
    docker-php-ext-install pdo pdo_mysql mysqli mbstring zip intl opcache xml; \
    a2enmod rewrite headers; \
    rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Apache apuntando a CakePHP /webroot
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf \
    && sed -ri -e "s!<Directory /var/www/html>!<Directory ${APACHE_DOCUMENT_ROOT}>!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

# Copiar proyecto
COPY proyectofinal-tecweb2/ /var/www/html

# Instalar dependencias PHP del proyecto
RUN composer install --no-interaction --prefer-dist || true

# Permisos CakePHP
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/tmp /var/www/html/logs || true

EXPOSE 80

CMD ["apache2-foreground"]
```
compose.yml
```bash
services:
  php-app:
    build: .
    container_name: cakephp_app
    ports:
      - "8080:80"
    volumes:
      - ./proyectofinal-tecweb2:/var/www/html
      - /var/www/html/vendor
    depends_on:
      - db
    restart: unless-stopped

  db:
    image: mariadb:10.11
    container_name: cakephp_db
    environment:
      MYSQL_ROOT_PASSWORD: server123
      MYSQL_DATABASE: db_ef
      MYSQL_USER: root
      MYSQL_PASSWORD: server123
    volumes:
      - ./db_data:/var/lib/mysql
      - ./init.sql:/docker-entrypoint-initdb.d/init.sql
    restart: unless-stopped

  phpmyadmin:
    image: phpmyadmin:latest
    container_name: cakephp_phpmyadmin
    ports:
      - "8081:80"
    environment:
      PMA_HOST: 10.89.0.2
      PMA_PORT: 3306
      PMA_USER: root
      PMA_PASSWORD: server123
      MYSQL_ROOT_PASSWORD: server123
    depends_on:
      - db
    restart: unless-stopped
```
4.Construir imagen y levantar contenedores
```bash
podman-compose up -d --build
```
5. Verificar que esten 3 contenedores activos: la app, base de datos y phpMyAdmin
```bash
podman ps
```
-Ejemplo:
live@minios:~/devops$ podman ps
CONTAINER ID  IMAGE                                COMMAND               CREATED      STATUS      PORTS                 NAMES
bca31d5ee0a1  docker.io/library/mariadb:10.11      mariadbd              2 hours ago  Up 2 hours  3306/tcp              cakephp_db
bef60d96b560  localhost/devops_php-app:latest      apache2-foregroun...  2 hours ago  Up 2 hours  0.0.0.0:8080->80/tcp  cakephp_app
5264b68ab032  docker.io/library/phpmyadmin:latest  apache2-foregroun...  2 hours ago  Up 2 hours  0.0.0.0:8081->80/tcp  cakephp_phpmyadmin

6. Acceder a la aplicacion:
http://localhost:8080
Solucionar problemas de permisos (Mas seguro que le suceda):
Ejecutar :
```bash
podman exec -it cakephp_app bash
```
Dentro:
```bash
mkdir -p /var/www/html/logs
mkdir -p /var/www/html/tmp/cache/models
mkdir -p /var/www/html/tmp/cache/persistent

chown -R www-data:www-data /var/www/html/tmp /var/www/html/logs
chmod -R 775 /var/www/html/tmp /var/www/html/logs
```
Crear  archivo de configuración local para BD
```bash
cp config/app_local.example.php config/app_local.php
```
Buscar esta secciòn dentro del archivo app_local.php y reemplazarla por esta:
```bash
'Datasources' => [
    'default' => [
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Mysql',
        'persistent' => false,
        'host' => '10.89.0.2',
        'username' => 'root',
        'password' => 'server123',
        'database' => 'db_ef',
        'encoding' => 'utf8mb4',
        'timezone' => 'UTC',
        'cacheMetadata' => true,
        'quoteIdentifiers' => false,
        'url' => env('DATABASE_URL', null),
    ],
```
La ip se obtiene con: podman inspect cakephp_db | grep IPAddress (esa ip poner en host de archivo app_local.php y en PMA_HOST en compose.yml para phpmyadmin)
Bajar contenedores:podman-compose down
Reconstruir imagen y levantar contenedores:podman-compose up -d --build
(Despues debera poder acceder al sistema sin problemas)

-Acceder a phpMyAdmin: http://localhost:8081/ (descargar de este github el archivo db_ef.sql e importar la BD dentro de la BD "db_ef" que ya està creada)
Credenciales de acceso rol admin: ap@gmail.com con contraseña 123
Credenciales de acceso rol cliente: mf@gmail.com con contraseña 123

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
