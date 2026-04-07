# app_ef - Entregable Final Tecnologías Web II

## Descripción
Sistema de gestión de mascotas multilingüe desarrollado con CakePHP 5.x.
Permite a cada usuario gestionar sus mascotas en español o inglés mediante un selector en la barra de navegación.

## Tecnologías
- CakePHP 5.x
- PHP 8.4 + Apache
- MariaDB
- Docker/Podman
- Composer

## Estructura del proyecto
entregableFinal/
├── app_ef/          # Código fuente CakePHP
├── Dockerfile       # Imagen PHP 8.4 + Apache
├── compose.yml      # Orquestación de contenedores
└── db_data/         # Datos persistentes de MariaDB
## Base de datos
- Nombre: `db_ef`
- Tablas: `users`, `mascotas`
```sql
CREATE DATABASE IF NOT EXISTS db_ef CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(250) NOT NULL,
    apellido VARCHAR(250) NOT NULL,
    correo VARCHAR(250) NOT NULL UNIQUE,
    password VARCHAR(255),
    language VARCHAR(10) DEFAULT 'es',
    telefono VARCHAR(20),
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE mascotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especie VARCHAR(100) NOT NULL,
    fecha_adopcion DATE NOT NULL,
    descripcion_es TEXT,
    descripcion_en TEXT,
    user_id INT NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## Instrucciones de despliegue

### 1. Configurar containers.conf
```bash
sudo mousepad /etc/containers/containers.conf
```
Agregar:
[engine]
network_cmd = "host"
preserve_fds = []

### 2. Clonar el repositorio
```bash
git clone git@github.com:DxJhxn/app_ef.git
cd entregableFinal
```

### 3. Configurar base de datos
```bash
cp app_ef/config/app_local.example.php app_ef/config/app_local.php
```
Editar `app_local.php` con las credenciales:
- Host: `db`
- Usuario: `jhone`
- Contraseña: `1234`
- Base de datos: `db_ef`

### 4. Construir la imagen
```bash
podman build -t ef-app .
```

### 5. Levantar contenedores
```bash
podman compose up -d
```

### 6. Acceder a la aplicación
- App: http://localhost:8080
- phpMyAdmin: http://localhost:8086

## Funcionalidades
- Login y registro de usuarios
- Selector de idioma ES/EN en la barra de navegación
- CRUD completo de mascotas por usuario
- Cada usuario ve solo sus propias mascotas
- Búsqueda por nombre o especie
- Interfaz multilingüe completa (ES/EN)
- Mensajes de éxito/error traducidos
- Contenedores separados: PHP+Apache y MariaDB