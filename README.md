
# Nexura

Instalaciones
1. Composer https://getcomposer.org/download/
2. XAMPP https://www.apachefriends.org/download.html PHP > 7.4 
3. NodeJS https://nodejs.org/en/ versión LTS
4. GIT https://git-scm.com/

Una vez clonado el proyecto crear un archivo .env en la raíz del proyecto
Copiar y pegar el siguiente codigo en el archivo .env

APP_NAME=Nexura
APP_ENV=local
APP_KEY=base64:vJVoH0oh3Ktz+XjSP2o6jn/ByUT4+s79d3Bam0iiw3A=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nexura
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

================================================================

Crear base de datos con nombre nexura en phpMyAdmin (XAMPP)
Cotejamiento, utf8mb4_unicode_ci

================================================================

Abrir una terminal en la raíz del proyecto y ejecutar los siguientes comandos

1. composer install
2. npm install
3. npm run dev
4. php artisan migrate:fresh --seed 
   Este comando creara las tablas en la base de datos y hara una inserción de datos configurados por defecto
5. php artisan serve
   Una vez ejecutado este comando, abrir el navegador que tenga instalado en su equipo y dirigirse a esta URL http://127.0.0.1:8000

Para acceder a la aplicación debera hacer login con los siguientes datos:
email   : babelsolo@gmail.com
password: 123456789