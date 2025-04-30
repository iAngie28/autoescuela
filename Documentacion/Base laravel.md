# Instalación de servidor
- Xamp -> 8.2.12 ![[Pasted image 20250427201207.png]]
- Composer ultima version -> como nota tener instalado el 7zip
- Lo instale desde el instalador de Laravel desde power Sherll
```PowerShell
# Run as administrator...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```
Versión de Laravel 12.0.7
La direccion para crear la carpeta es: "C:\xampp\htdocs\laravel"
La carpeta laravel la debo crear
```cdm
cd C:\xampp\htdocs\laravel
```

```git cmd
composer create-project laravel/laravel mi-proyecto-laravel
```
Crear proyecto con versión
```git cmd
composer create-project laravel/laravel mi-proyecto-laravel 5.5.*
```

## Para conectar worbench con mysql de xamp
# 1. Primero hay que matar el puerto 3306
#### Usando Command Prompt (CMD)**

1. **Abre CMD como Administrador** (escribe `cmd` en el buscador de Windows > clic derecho > "Ejecutar como administrador").
    
2. Ejecuta este comando para ver qué proceso usa el puerto 3306:
```cmd
    netstat -ano | findstr 3306
```
Salida ejemplo
```cmd
   TCP    0.0.0.0:3306           0.0.0.0:0              LISTENING       1234
```
Donde **`1234`** es el **PID** (ID del proceso).
Usa el PID obtenido (`1234` en el ejemplo) y ejecuta:

```cmd
   taskkill /F /PID 1234
```
Ejecuta este comando para ver qué proceso usa el puerto 3306:
```cmd
    netstat -ano | findstr 3306
```
- Si **no muestra resultados**, el puerto está libre.
# 2. Conectar conxamp
1. **Asegúrate de que XAMPP esté instalado y MySQL esté iniciado**:
   - Abre el Panel de Control de XAMPP.
   - Haz clic en `Start` junto a **MySQL**. Debe aparecer `Running` en verde.

2. **Verifica el usuario y contraseña**:
   - Por defecto, XAMPP usa:
     - **Usuario**: `root`
     - **Contraseña**: *(vacía, a menos que la hayas cambiado)*.

# Cambiar puertos del mysql en el xamp
- Agregar cambiar el puerto en mysql.ini
- cambiar en: "C:\xampp\phpMyAdmin" agregar debajo del host
- '$cfg['Servers'][$i]['port'] = '3307';'
# Para correr el proyecto
```
php artisan serve
```
### [[Errores]]
# [[Migraciones]]

```
Cambio
/* resources/css/app.css */
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Fuente personalizada (opcional) */
@import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&display=swap');

/* Estilos personalizados (si los necesitas) */
```

```
@import 'tailwindcss';

  

@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';

@source '../../storage/framework/views/*.php';

@source '../**/*.blade.php';

@source '../**/*.js';

  

@theme {

    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',

        'Segoe UI Symbol', 'Noto Color Emoji';

}
```