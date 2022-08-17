DESAFÍO: ALDEAS INSEGURAS
=====================================

Link del enunciado: https://docs.google.com/document/d/1yCllBW9TksUBeZFMUSKR4g5iBISppiyFER3JuKBAITE/edit?usp=sharing

Instalación
-------------------
1. Configurar la URL en WEB_PATH en el archivo config.php.
2. Configurar servidor para que no liste los archivos.
3. Colocar hash en archivo /src/ctl/enviar_mercancia.ctl.php donde dice [[AQUÍ VA EL HASH]].


Resolución
-------------------
Se resuelve con el cambio de ids que se envían en la transferencia de oro manipulando los 
parametros id_jugador_origen  y select_jugador_destino. Primero se deben manipular de forma
que una aldea (A) le mande a la otra (B), luego de esta última (B) que le envíe a la restante (C).
Por último, desde ésta (C) nos enviamos todo el oro: id_jugador_origen: Id de C y select_jugador_destino: mi id

