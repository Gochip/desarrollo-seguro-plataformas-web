## SQL Injection en PHP

### Ejecutar el proyecto
Para levantar el proyecto, debemos ingresar al directorio `sql_injection/vulnerable/php/`:  
`cd sql_injection/vulnerable/php/`  
Luego ejecutamos docker compose para que se ejecuten los servicios web y base de datos indicados en el archivo 
docker-compose.yaml:  
 `docker-compose up` 

### Probar vulnerabilidades
Una vez levantado el proyecto, ingresar mediante un navegador web a *http://localhost/sqli/frontend/*. ¡Listo! Comenzar a probar inyecciones sqli...