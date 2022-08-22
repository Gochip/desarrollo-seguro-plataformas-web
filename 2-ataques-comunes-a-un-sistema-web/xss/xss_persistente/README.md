XSS persistente
=====================================

Este proyecto muestra un ataque de XSS persistente.

Instalación y ejecución.
-------------------
Consta de 2 partes: la app y el receptor.

La app es la aplicación vulnerable a XSS. Es un sitio escrito en PHP. Para ejecutarlo hay que crear previamente la base de datos desde el archivo bd.sql. Luego configurar en el archivo comun.php, las credenciales de acceso a la base de datos.
Adentro del directorio app existe un directorio private que contiene 2 archivos JavaScript que roban la sesión y la envían al receptor (uno utiliza JQuery y el otro no, pero ambos tienen el mismo objetivo).

Por otro lado, el receptor es el encargado de recibir las cookies. Para que este funcione adecuadamente se debe crear un archivo sesiones_robadas.txt en el mismo directorio donde está el archivo recopilador.php y con permisos de escritura para el usuario www-data en caso que se esté usando Apache como servidor web.

