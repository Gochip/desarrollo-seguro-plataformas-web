<?php 
require_once("comun.php");
$mensaje = "";
if(isset($_POST['btnIngresar'])){
	if(verificar_usuario($_POST['txtNombre'],$_POST['txtClave']) === true){
		$conjunto_resultados = $conexion->query("SELECT * FROM usuarios WHERE nombre='{$_POST['txtNombre']}'");
		$resultados = array();
		$resultados[] = $conjunto_resultados->fetch_assoc();
		if(!empty($resultados[0])){
			$_SESSION["id_usuario"] = $resultados[0]["id"];
			header("Location: perfil.php");
			exit;
		}
	}
	$mensaje = "Usuario incorrecto";
}
function verificar_usuario($nombre, $clave){
	global $conexion;
	$conjunto_resultados = $conexion->query("SELECT * FROM usuarios WHERE nombre='{$nombre}'");
	$resultados = array();
	$resultados[] = $conjunto_resultados->fetch_assoc();
	if(!empty($resultados)){
		$clave_bd = $resultados[0]["clave"];
		if($clave == $clave_bd){
			return true;
		}
	}
	return false;
}
?>
<html>
	<head>
		<title>Ejercicio CSRF</title>
		<link type="text/css" href="css.css" rel="stylesheet"/>
		<script src="jquery-1.9.1.min.js" type="text/javascript" ></script>
	</head>
	<body>
	<div class="contenedor">
	<div class="centro">
		<?php if(!empty($mensaje)):?>
			<div class="mensaje"><?php echo $mensaje;?></div>
		<?php endif;?>
		<form method="post" action="index.php">
			<table>
				<tr>
					<td>
						<label>
							Nombre:
						</label>
					</td>
					<td>
						<input type="text" value="" name="txtNombre"/>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							Clave:
						</label>
					</td>
					<td>
						<input type="password" value="" name="txtClave"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Ingresar" name="btnIngresar"/>
					</td>
				</tr>
			</table>
		</form>
		</div>
		</div>
	</body>
</html>
