# Hola Mundo PHP + MySQL con Docker Compose

Aplicación web "Hola Mundo" en PHP que se conecta a una base de datos MySQL, todo levantado con Docker Compose.

## Estructura

```
.
├── docker-compose.yml   # Servicios: app (PHP + Apache) y db (MySQL)
├── Dockerfile           # Imagen PHP 8.3 + Apache con la extensión pdo_mysql
├── db/
│   └── init.sql         # Crea la tabla `mensajes` con datos de ejemplo
└── src/
    └── index.php        # App Hola Mundo que consulta la BD
```

## Servicios

- **app**: servidor de aplicación PHP 8.3 con Apache. Monta `./src` en `/var/www/html` y expone el puerto `8081`.
- **db**: MySQL 8.4. Crea la base `holamundo` y ejecuta `db/init.sql` al iniciar por primera vez.

La app espera a que MySQL esté listo (healthcheck) antes de arrancar.

## Uso

```bash
docker compose up -d --build
```

Abrir http://localhost:8081. La página muestra "Hola Mundo", la versión de MySQL y los mensajes leídos de la tabla.

Para detenerlo:

```bash
docker compose down
```

Para borrar también los datos de MySQL:

```bash
docker compose down -v
```

> Las contraseñas del `docker-compose.yml` son solo para esta práctica local.
