#  Banco

## Dependencias
- PHP 8.2
- Node 20
- Laravel
- MySql

## Instalando el entorno de desarrollo 👷:
 1. Clona este repositorio en tu maquina local
```git
git clone https://github.com/TomasNavarrete/bancos.git
```
2. Para instalar las dependencias ejecuta estas dependencias:
```bash 
composer install
```
- Instala después las dependencias de node:
```bash
npm i
```
- Cambia los datos de conexión de la base de datos dentro de .env:
```
DB_CONNECTION=mysql
DB_HOST= Host de la base de la base de datos
DB_PORT= Puerto de la base de datos
DB_DATABASE= Nombre de la base de datos
DB_USERNAME= Nombre del usuario de la base de datos
DB_PASSWORD= Contraseña de la base de datos
```
-- Genera un key de encriptación
```bash
php artisan key:generate
```
- Realiza la migración de la base de datos con:
```bash
php artisan migrate
```

## Para configurar el smtp:
- Pon la siguiente configuración dentro de .env:
```
MAIL_MAILER=smtp
MAIL_HOST=Host del smtp
MAIL_PORT=Puerto del smtp
MAIL_USERNAME=Usuario dentro del smtp
MAIL_PASSWORD=Contraseña del usuario dentro de smtp
MAIL_ENCRYPTION=Método de encriptación de la contraseña
MAIL_FROM_ADDRESS=Dirección desde donde se quiere mostrar que se envio el mail
MAIL_FROM_NAME="${APP_NAME}"
```
## Ejecuta la aplicación✔️ :
- Para ejecutar la aplicación de forma local:
```bash
npm run dev
```
- Ejecute laravel:
``` bash
php artisan serve
```

## Para pasar a producción:
- Cree y haga los cambios necesarios dentro de .env como el cambio de credenciales de la base de datos:
- Cambie la contraseña de la base de datos dentro del docker-compose
- Ejecute el siguiente comando:
```bash
docker build -t bank-app:0.1
```
- Ejecute los contenedores con:
```bash
docker-compose up -d
```
- Ejecute las migraciones de la base de datos
```
docker exec bank-app php artisan migrate
```
- Ingrese los datos de la base de datos

## Importar información a la base de datos
Para ingresar la información y registros a la base de datos, dentro de la carpeta database/data se encuentran varios archivos sql que deben ser ejecutados en el siguiente orden:
- Estados
- Bancos
- Users
- Clientes
- CtasxClientes