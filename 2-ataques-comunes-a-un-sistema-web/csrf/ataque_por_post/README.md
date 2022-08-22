# CSRF por POST

La idea de este ejemplo es que un usuario inicie sesión a un sitio web y, que reciba un enlace malicioso, lo abre y que al apretar el "botón" le cierra la sesión.
Cerrar la sesión parecería que no es algo problemático pero si llevamos esta misma técnica a aplicar a otros endpoints podría ser un ataque muy grave.

## Pasos para ejecutar
1. Abrir el archivo `web/login.php` desde un navegador usando un dominio X. Se puede usar `ngrok`. Iniciar sesión como admin.  
2. Abrir el archivo `web_maliciosa/index.html` desde el mismo navegador previamente habiendo iniciado sesión pero usando otro dominio. Por ejemplo, usar `localhost`.  
3. Apretar en el botón "Botón mágico" cerrará la sesión del primero.  
