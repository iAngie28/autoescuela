# Para descargar la versión del git
```git
# Entra al directorio del proyecto
cd ~/proyectos/mi-repositorio

# Descarga los últimos cambios de GitHub
git fetch origin

# Resetea la rama main local para que coincida con GitHub
git reset --hard origin/main

# Opcional: Elimina archivos no rastreados (si es necesario)
git clean -fd
```

# Subir
```
git add .
git commit -m "mensaje"

```
