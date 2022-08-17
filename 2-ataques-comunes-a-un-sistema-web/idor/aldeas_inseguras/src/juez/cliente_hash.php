<?php
/*
    Esta clase es un cliente del servidor Hash.
    Se utiliza para obtener un hash o para guardar una respuesta.
    @author Parisi Germán
    @version 1.0
*/
class ClienteHash{
    private $_socket;

    public function __construct(){
        
    }
    
    private function _conectar(){
        $this->_socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $conectado = socket_connect($this->_socket, 'localhost', 19500);
        return $conectado;
    }
    
    private function _cerrar(){
        socket_close($this->_socket);
    }
    
    /*
        Retorna el hash de un determinado desafío a través de su id.
        Retorna null en caso que el id pasado como argumento sea incorrecto o
        en caso que haya ocurrido un error.
        @param string $id es el id del desafío.
        @return string el hash solicitado.
    */
    public function obtener_hash($id){
        $hash = null;
        $conectado = $this->_conectar();
        if($conectado){
            $comando = "obtener_hash $id\r\n";
            $ok = socket_write($this->_socket, $comando, strlen($comando));
            if($ok){
                $leido = socket_read($this->_socket, 512);
                $leido = utf8_encode($leido);
                $partes = explode("\r\n", $leido);
                $estado = $partes[0];
                if($estado == "0" && count($partes) == 3){
                    $hash = $partes[1];
                }
            }
            $this->_cerrar();
        }
        return $hash;
    }

    /*
        Guarda la respuesta de un grupo para un desafío con un hash.
        @return true si se guardó con éxito y la respuesta fue la correcta,
        false en cualquier otro caso.
    */
    public function guardar_respuesta ($id_desafio, $hash, $id_grupo){
        return true;
    }
}
