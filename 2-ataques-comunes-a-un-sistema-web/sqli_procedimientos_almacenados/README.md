## SQL Injection en procedimiento almacenado usando PHP

### Ejecutar el proyecto
Para levantar el proyecto, debemos ejecutar docker compose para que se inicien los servicios web y base de datos indicados en el archivo docker-compose.yaml:  
`docker-compose up --build` 
Una vez que los contenedores estén levantados, se debe proceder a ejecutar el script que crea el procedimiento almacenado haciendo:
`docker exec -it [ID_CONTENDOR] php /data/sp.php`
Donde ID_CONTENDOR es el id del contenedor con nombre "sqli_procedimientos_almacenados_web". Para obtener el id, se puede ejecutar:
`docker container ls`

### Probar vulnerabilidades
Una vez levantado el proyecto, ingresar mediante un navegador web a *http://localhost/sqli_pa/pa.php?codigo=test*. ¡Listo! Comenzar a probar inyecciones sqli...