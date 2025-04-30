# Puerto se encuentra bloqueado aunque este libre

```terminal
Failed to listen on 127.0.0.1:8000 (reason: ?)
Failed to listen on 127.0.0.1:8001 (reason: ?)
Failed to listen on 127.0.0.1:8002 (reason: ?)
Failed to listen on 127.0.0.1:8003 (reason: ?)
Failed to listen on 127.0.0.1:8004 (reason: ?)
Failed to listen on 127.0.0.1:8005 (reason: ?)
Failed to listen on 127.0.0.1:8006 (reason: ?)
Failed to listen on 127.0.0.1:8007 (reason: ?)
Failed to listen on 127.0.0.1:8008 (reason: ?)
Failed to listen on 127.0.0.1:8009 (reason: ?)
Failed to listen on 127.0.0.1:8010 (reason: ?)
```
### Solucion: Cambiar en la configuración base de php
For getting php.ini file run this command for getting php.ini file if you don't know exact path of your ini file.

```php
php --ini
```

This command will return the file location of php.ini  
It will look like this in the case of Windows:

```php
Loaded Configuration File:

C:\Users\SVA\.config\herd\bin\php83\php.ini
```

Then edit **variables_order** this variable

```php
variables_order = "GPCS"
```

After you have changed this now you need to restart your server or restart your pc.

$cfg['Servers'][$i]['port'] = '3307';

## Error de que no existe la migracion
```terminal
php artisan session:table
php artisen migrate:fresh

```