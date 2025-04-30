# Comando para crear migraciones
```terminal
php artisan make:migration create_tableName
```

# En caso de emergencia
```terminal
php artisan migrate:fresh
```

# En caso de que haya un error en la conexión
- Al reiniciar la conexión es posible que la tabla sesión se deba reiniciar también:
### Eliminar la migración antigua y crearla de nuevo

Si crees que la migración está corrupta o quieres empezar desde cero:

1. Elimina manualmente el archivo de migración que tenga el nombre similar a:

```
xxxx_xx_xx_xxxxxx_create_sessions_table.php
```

Lo encontrarás en:

```
database/migrations/
```

2. Luego, vuelve a generar la migración con:
```bash
php artisan session:table
```

3. Y finalmente, corre las migraciones:
```bash
php artisan migrate
```

# Estructura base
## Up()
- Contiene los cambios a aplicar
- Usa `Schema::create()` para nuevas tablas
- Usa `Schema::table()` para modificar tablas existentes
## Down()
-  Contiene cómo revertir los cambios
- Normalmente elimina la tabla o columnas añadidas


### NOTA
- Las columnas son automáticamente 'not null' a menos que se declare:
```php
Schema::create('users', function (Blueprint $table) {
    $table->string('email'); // NOT NULL por defecto
    $table->string('phone')->nullable(); // NULL permitido
});
```
## 🛠️ Tipos de Columnas Comunes

| Método Blueprint                | Descripción                                 | Ejemplo                              |
| ------------------------------- | ------------------------------------------- | ------------------------------------ |
| `$table->id()`                  | ID autoincremental                          | `$table->id();`                      |
| `$table->string(nombre, limit)` | Cadena de texto (varchar)                   | `$table->string('name', 100);`       |
| `$table->text()`                | Texto largo                                 | `$table->text('description');`       |
| `$table->integer()`             | Número entero                               | `$table->integer('age');`            |
| `$table->boolean()`             | Valor booleano                              | `$table->boolean('active');`         |
| `$table->dateTime()`            | Fecha y hora                                | `$table->dateTime('published_at');`  |
| `$table->timestamps()`          | created_at y updated_at                     | `$table->timestamps();`              |
| `$table->foreignId()`           | Clave foránea                               | `$table->foreignId('user_id');`      |
| `$table->char()`                | Equivalente a `CHAR` con una longitud dada: | `$table->char('name', length: 100);` |
## Indices (Especificaciones)

| Comando                                 | Descripción               |
| --------------------------------------- | ------------------------- |
| `$table->primary('id');`                | Añade una clave primaria. |
| `$table->primary(['id', 'parent_id']);` | Añade claves compuestas.  |
| `$table->unique('email');`              | Añade un índice único.    |
# 🔑 Llaves Foráneas (Foreign Keys) en Laravel Migrations
## Estructura Básica de una Llave Foránea

```php
Schema::table('posts', function (Blueprint $table) {
    $table->foreignId('user_id')  // Crea columna user_id (bigint unsigned)
          ->constrained()        // Referencia a la tabla users (por convención)
          ->onUpdate('cascade')  // (Opcional) Comportamiento al actualizar
          ->onDelete('cascade'); // (Opcional) Comportamiento al eliminar
});
```
También se puede usar references on
```php
Schema::table('posts', function (Blueprint $table) {
    $table->foreignId('user_id')  // Crea columna user_id (bigint unsigned)
          -> references('id')    // Referencia a la columna id
          ->on('user_table')      // referencia a la tabla user
          ->onUpdate('cascade')  // (Opcional) Comportamiento al actualizar
          ->onDelete('cascade'); // (Opcional) Comportamiento al eliminar
});
```

## 🔍 Explicación Detallada

### 1. **Creación de la columna foránea**
- `foreignId()` crea una columna `BIGINT UNSIGNED` con el nombre especificado
- Por convención, Laravel asume:
  - Nombre de tabla referenciada: singular de la columna (ej: `user_id` → tabla `users`)
  - Columna referenciada: `id`

### 2. **Opciones de comportamiento**
| Método          | Descripción                           | Valores comunes                                |
| --------------- | ------------------------------------- | ---------------------------------------------- |
| `constrained()` | Especifica la tabla referenciada      | `->constrained('users', 'id')`                 |
| `onUpdate()`    | Comportamiento al actualizar el padre | `cascade`, `restrict`, `set null`, `no action` |
| `onDelete()`    | Comportamiento al eliminar el padre   | `cascade`, `restrict`, `set null`, `no action` |
|                 |                                       |                                                |

## 🛠️ Ejemplos Prácticos

###  Llave compuesta
```php
Schema::table('order_items', function (Blueprint $table) {
    $table->foreignId('order_id')->constrained();
    $table->foreignId('product_id')->constrained();
    
    $table->primary(['order_id', 'product_id']);  // Llave primaria compuesta
});
```

## ⚠️ Consideraciones Importantes

1. **Orden de migraciones**:
   - Primero crea las tablas referenciadas (ej: `users`)
   - Luego las tablas con llaves foráneas (ej: `posts`)
2. **Documentación**:
   - Comenta relaciones complejas
   ```php
   // Relación con modelo legacy (no sigue convenciones)
   $table->foreignId('old_user_id')
         ->constrained('legacy_users', 'old_id')
         ->comment('Relación con sistema anterior');
   ```

## ✨ Características Avanzadas

1. **Claves foráneas**:
   ```php
   $table->foreignId('user_id')
         ->constrained() // referencia a tabla users
         ->onDelete('cascade');
   ```

2. **Índices**:
   ```php
   $table->string('email')->unique();
   $table->index(['last_name', 'first_name']);
   ```

3. **Columnas nullable**:
   ```php
   $table->string('middle_name')->nullable();
   ```

4. **Valores por defecto**:
   ```php
   $table->boolean('is_admin')->default(false);
   ```

## 📌 Ejemplo Completo: Migración para Posts

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->string('title', 200);
        $table->text('content');
        $table->string('slug')->unique();
        $table->boolean('published')->default(false);
        $table->dateTime('published_at')->nullable();
        $table->timestamps();
        $table->softDeletes(); // Para eliminación "suave"
    });
}

public function down()
{
    Schema::dropIfExists('posts');
}
```

## 💡 Buenas Prácticas

1. **Nombres descriptivos**: `create_users_table`, `add_role_to_users_table`
2. **Orden lógico**: Primero crea tablas, luego añade relaciones
3. **Una migración por cambio**: Cambios atómicos son más fáciles de revertir
4. **Documentación**: Comenta migraciones complejas

¿Quieres que profundice en algún aspecto específico de las migraciones?

```php
 // Nombre de la tabla (opcional si sigue convención de nombres)
    protected $table = 'rol';

    // Constantes para los roles (como las que mostraste)
    const ADMINISTRADOR = 1;
    const INSTRUCTOR = 2;
    const USUARIO = 3;

    // Campos que se pueden llenar masivamente (importante para crear/actualizar)
    protected $fillable = [
        'nombre',
        'permisos'
    ];
```