## Pasos para la conexión a la base de datos
1. <h3>Descargar e instalar el driver de SQL server para php si aún no se tiene instalado (en caso de tenerlo instalado puede omitir este paso)</h3>

    - Para descargarlo, nos dirigimos a la página de descarga con el siguiente enlace: https://learn.microsoft.com/en-us/sql/connect/php/download-drivers-php-sql-server
   
    - Una vez descagado, extraemos el archivo .rar o .zip
      
    - Verificamos la versión de php instalada en nuestro Sistema Operativo
      
    - Según la versión php que tengamos instalada buscamos los archivos del driver en la carpeta descomprimida que acabamos de descargar, que corresponda a dicha versión. Por ejemplo:
      
    Si tenemos instalada la versión 8.1 de php, los archivos que debemos buscar son: php_pdo_sqlsrv_81_ts_x64.dll y el php_sqlsrv_81_ts_x64.dll (puede ser x86, depende de la arquitectura del sistema operativo de nuestro ordenador)
   
    - Esos archivos los copiamos, y nos dirigimos a la ruta de nuestro disco local (C:) ya sea en xampp o donde tengamos la carpeta de php y dentro de php, ubicamos la carpeta ext (extensiones) y allí los pegamos.
      
    - Regresamos a la carpeta php, buscamos el archivo php.ini y lo abrimos con nuestro editor de texto de preferencia. Una vez ahí, buscamos el apartado de extensiones y agregamos nuestras extenciones de la siguiente manera:
        extension=php_sqlsrv_81_ts_x64.dll
        extension=php_pdo_sqlsrv_81_ts_x64.dll
   
    - Una vez agregadas las extenciones, guardamos los cambios y reiniciamos el ordenador (opcional)
      

 2. <h3>Configuración SGBD SQL server</h3>
 
     - Nos dirigimos a https://www.microsoft.com/es-es/sql-server/sql-server-downloads y seleccionamos una edición especializada gratuita. En mi caso les recomiendo la versión developer. Una vez descargado procedemos a instalarlo siguiendo las instrucciones que se presentan en pantalla.
     
     -  Una vez instalado sql server, descargamos sql server management studio, instalamos e inicializamos.
       
     -  Cuando inicie SSMS (SQL SERVER MANAGEMENT STUDIO) configuramos los parámetros de inicio de sesión como el <strong> tipo de servidor </strong> para el que recomiendo Database Engine, <strong> nombre del servidor </strong>, que podemos dejarlo por defecto, en <strong> autenticación </strong> recomiendo seleccionar el Windows Authentication para facilitar la conexión con laravel. <strong> Encryption </strong> lo dejamos como mandatory, seleccionamos el checkbox para trust server certificate y le damos en conectar.
       
     - Al estar en la interfaz de SSMS, buscamos el SQL Server Agent, hacemos clic derecho e iniciamos, ahora ya podemos crear y gestionar bases de datos. Hacemos clic derecho en la carpeta Databases que se despliega al hacer clic en el '+' al lado del nombre del servidor, seleccionamos new database, le asignamos el nombre de bdd configurado en nuestro proyecto laravel y damos ok.
       
     - Para la conexión con laravel, es necesario que creemos un usuario, para esto damos clic en el '+' al lado de la carpeta security y hacemos clic derecho sobre la carpeta logins y seleccionamos new login.
       
     - Escribimos un login name, escribimos nuestra contraseña, seleccionamos el checkbox de Enforce password policy y en Default database seleccionamos nuestra base de datos que estará asignada a ese usuario y damos clic en ok.
       
     - Debemos asegurarnos que SQL SERVER acepte conexiones remotas. Para ello hacemos clic derecho sobre el nombre del servidor y nos dirigimos a propiedos, una vez allí buscamos el apartado de conexiones y habilitamos las conexiones remotas.
       
     - Ahora tenemos que verificar que esté habilitado el protocolo TCP/IP para lo cual presionamos WIN+R y escribimos SQLServerManager16.msc lo cual nos abrirá el SQL SERVER Configuration Manager
       
     - Nos dirigimos donde dice Configuración de red de SQLSERVER hacemos doble clic en Protocolos de MSSQLSERVER y verificamos que el protocolo TCP/IP se encuentre habilitado, caso contrario lo habilitamos.
       
     - Ahora habrá que verificar SQL SERVER esté utilizando el puerto 1433 que es el establecido por defecto para configuraciones TCP/IP. Hacemos clic derecho sobre TCP/IP, propiedades y direcciones IP, ahí revisamos que esté establecido el puerto 1433.
       
     -También tenemos que asegurarnos que se estén ejecutando los servicios de SQL SERVER, para lo cual hacemos doble clic en Servicios de SQL SERVER y verificamos que estén ejecutándose los servicios de SQL SERVER (MSSQLSERVER), SQL Server Browser y Agente SQL SERVER (MSSQLSERVER)
    
 3. <h3>Configuración .env en Laravel </h3>

      - En nuestro proyecto laravel, buscamos el archivo .env y procedemos a configurar las variables de entorno en base a la configuración previa realizada de nuestro sistema gestor de base de datos.
        
      - La configuración del .env debería quedar algo así:

                    DB_CONNECTION=sqlsrv
                    DB_HOST=localhost o ip máquina ej: 192.168.1.15
                    DB_PORT=1433
                    DB_DATABASE=<nombre-base-datos>
                    DB_USERNAME=<login-name-configurado-en-ssms>
                    DB_PASSWORD=<password-configurada-en-ssms>

    - Una vez realizada esta configuración probamos nuestra conexión ejecutando las migraciones con el comando php artisan mihgrate en la terminal de la carpeta de nuestro proyecto laravel.
   
    - Con esto ya tendríamos lista nuestra conexión de laravel con sql server, en caso de que te de error revisa detenidamente alguno de los pasos anteriores.
 
   
     
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
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

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
