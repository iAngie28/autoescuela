## Instalar desde composer herramienta de creacion de CRUD
``` terminal
composer require ibex/crud-generator --dev  //instalar crud automaticos

php artisan vendor:publish --tag=crud //publicar
```
# Comando para crear CRUD
```
php artisan make:crud NombreTabla
```

## La primera vez se deben correr los siguientes comandos:
```
composer require laravel/ui  //instalar vistas

php artisan ui bootstrap

php artisan ui bootstrap --auth

npm install && npm run dev

npm run build
```
# Para correr
```
npm run dev // debe correr de fondo en una segunda terminal
php artisan serve

```