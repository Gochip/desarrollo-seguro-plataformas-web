# CSRF por POST con formulario

Este proyecto muestra un ataque de CSRF por POST.

En el directorio `app` se encuentra la aplicación vulnerable a CSRF. Es un sitio escrito en PHP.
Por otro lado, hay un directorio `private` que contiene un código HTML que permite generar el ataque CSRF. Para probar, se debe colgar este HTML en internet, por ejemplo, usando [Codesandbox](https://codesandbox.io/). Antes de colgarlo, se debe modificar el "action" de la etiqueta form donde dice <DOMINIO> por el correspondiente.  

### Ejecutar proyecto

Ejecutar: `docker-compose up`  
Luego ingresar a: `http://<DOMINIO>/csrf_form_post/app/`  

Por default, `<DOMINIO>` es `localhost`, pero podrías usar un dominio temporal mediante alguna herramienta como ngrok.  
  
Usuarios por defecto:  
- german 123  
- fede 123  

Si hiciera falta, se puede agregar más usuarios en el archivo `bd.sql`. Una vez agregados, ejecutar `docker-compose up --build`.  

