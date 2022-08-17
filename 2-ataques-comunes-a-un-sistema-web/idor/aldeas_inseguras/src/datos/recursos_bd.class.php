<?php
class RecursosBd{
	private static $me;
	
	private function __construct(){
		
	}
	
	public static function getInstancia(){
		if(!self::$me instanceof self){
			self::$me = new self;
		}
		return self::$me;
	}
	
	public function getJugadores(){
		if(!isset($_SESSION['jugadores'])){
			return false;
		}
		return $_SESSION['jugadores'];
	}
	
	public function getJugador($id){
		if(!is_numeric($id) || $id < 0 || !isset($_SESSION['jugadores'])){
			return false;
		}
		foreach($_SESSION['jugadores'] as $clave => $jugador){
			if($jugador['id'] == $id){
				return $jugador;
			}
		}
		return false;
	}
	
	public function getNombre($id){
		return $this->getJugador($id)['nombre'];
	}
	
	public function getOro($id){
		return self::getJugador($id)['oro'];
	}

	public function recibioOro($id) {
		if(!is_numeric($id) && !isset($_SESSION['jugadores'])){
			return false;
		}
		foreach($_SESSION['jugadores'] as $clave => &$jugador){
			if($jugador['id']==$id){
				return $jugador['recibio_oro'];
			}
		}
		return false;
	}
	
	public function agregarOro($id,$cantidad_oro){
		if(!is_numeric($id) || !is_numeric($cantidad_oro) || $cantidad_oro < 0 || !isset($_SESSION['jugadores'])){
			return false;
		}
		
		foreach($_SESSION['jugadores'] as $clave => &$jugador){
			if($jugador['id']==$id){
				if (!$jugador['recibio_oro']) {
					$jugador['recibio_oro'] = true;
					return $jugador['oro'] += $cantidad_oro;
				} else {
					return false;
				}
			}
		}
		return false;
	}
	
	/**
		Si le intento quitar mas de lo que tiene, le quita
		todo el oro. Retorna la cantidad de oro que le pudo quitar.
	*/
	public function quitarOro($id,$cantidad_oro){
		if(!is_numeric($id) || !is_numeric($cantidad_oro) || $cantidad_oro < 0 || !isset($_SESSION['jugadores'])){
			return false;
		}
		foreach($_SESSION['jugadores'] as $clave => &$jugador){
			if($jugador['id']==$id){
				if($jugador['oro']< $cantidad_oro){
					$cantidad_oro = $jugador['oro'];
				}
				$jugador['oro']-=$cantidad_oro;
				return $cantidad_oro;
			}
		}
		return false;
	}
	
}
