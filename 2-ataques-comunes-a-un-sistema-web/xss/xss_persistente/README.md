# XSS persistente

Este proyecto muestra un ataque de XSS persistente.

La app es la aplicación vulnerable a XSS. Es un sitio escrito en PHP.
Adentro del directorio app existe un directorio private que contiene 2 archivos JavaScript que roban la sesión y la envían al receptor (uno utiliza JQuery y el otro no, pero ambos tienen el mismo objetivo).

Por otro lado, el receptor es el encargado de recibir las cookies y almacenarlas en un archivo temporal dentro del contenedor /tmp/sesiones_robadas.txt.

### Ejecutar proyecto

Ejecutar: `docker-compose up`  
Luego ingresar a: http:localhost/xss/app/  
  
Usuarios por defecto:  
- german 123  
- fede 123  

