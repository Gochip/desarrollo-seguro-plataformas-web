DESAFÍO: ALDEAS INSEGURAS
=====================================

Enunciado
-------------------
Aldeas inseguras es un simple juego referido a la edad media en el cual tenés que administrar tu propia aldea.
Tu amigo Pedro es fanático de este juego, quiere comprar una nueva aldea con mayor seguridad pero para eso necesita al menos 5000 de oro. Lamentablemente le resulta difícil juntar esa cantidad para realizar la compra. ¿Estás dispuesto ayudar a tu amigo?

Reglas del juego: Cada jugador cuenta con 3 tipos de recursos: oro, plata y bronce. Solo se permite el envío de oro a otras aldeas. Cada aldea puede recibir oro una vez por día y puede enviar las veces que quiera a distintas aldeas.

Aclaración: Al cerrar sesión todos los datos son reseteados.



Instalación
-------------------
`docker compose up --build`


Resolución
-------------------
Se resuelve con el cambio de ids que se envían en la transferencia de oro manipulando los parametros id_jugador_origen  y select_jugador_destino. Primero se deben manipular de forma que una aldea (A) le mande a la otra (B), luego de esta última (B) que le envíe a la restante (C).
Por último, desde ésta (C) nos enviamos todo el oro: id_jugador_origen: Id de C y select_jugador_destino: mi id
