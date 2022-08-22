# XSS Reflejado

Simple proyecto en Flask para prueba de concepto de XSS Reflejado.  
Notar que el archivo index tiene la extensión vhtml y se utiliza  
`render_template('index.vhtml')` para renderizar el html ya que los archivos con extensión .html, .htm, .xhtml y .xml son escapados correctamente.

Otra alternativa, podría ser utilizando index.html y utilizar el filtro `|safe` en el html o desactivar el autoescape: `{% autoescape false %}`.

## Ejecutar el proyecto
Crear la imagen docker: `docker build -t xss_reflejado .`  
Ejecutar el contenedor: `docker run -p "5000:5000" xss_reflejado`  
Una vez levantado el contenedor, ingresar mediante el navegador web a http://localhost:5000/.