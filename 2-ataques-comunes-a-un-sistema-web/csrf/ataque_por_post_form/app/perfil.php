<?php 
require_once("comun.php");

$nombre_usuario = "";
if(isset($_SESSION["id_usuario"])){
	$consulta = "SELECT nombre, domicilio, cbu, email FROM usuarios WHERE id = {$_SESSION["id_usuario"]}";
	$conjunto_resultados = $conexion->query($consulta);
	$resultados = array();
	$resultados[] = $conjunto_resultados->fetch_assoc();
	if(isset($resultados[0]) && !empty($resultados[0])){
		$nombre_usuario = $resultados[0]["nombre"];
	}
}else{
	header("Location: index.php");
	exit;
}
$mensaje = "";
if(isset($_POST["btn-modificar"])){
    $domicilio = $_POST["txt-domicilio"];
    $cbu = $_POST["txt-cbu"];
    $email = $_POST["txt-email"];
	if(isset($domicilio) && isset($cbu) && isset($email)){
		global $conexion;
		
		$id_usuario = $_SESSION["id_usuario"];
		$insercion = "UPDATE usuarios SET domicilio='{$domicilio}', cbu='{$cbu}', email='{$email}' WHERE id={$id_usuario}";
		if ($conexion->query($insercion)) {
			$mensaje = "Perfil actualizado";
			header("Location: perfil.php");
        	exit;
		}else{
			$mensaje = "Error al tratar de modificar el perfil: ".$conexion->error;
		}
	}
}
?>
<html>
	<head>
		<title>Mi Perfil</title>
		<link type="text/css" href="css.css" rel="stylesheet"/>
		<script src="jquery-1.9.1.min.js" type="text/javascript" ></script>
	</head>
	<body>
	<div class="contenedor">
		<?php if(isset($nombre_usuario)):?>
		<div id="encabezado_usuario">
			Usuario logueado: <span id="nombre_usuario"><?php echo $nombre_usuario;?></span>
			<a href="cerrar_sesion.php">[cerrar sesi&oacuten]</a>
		</div>
		<?php endif;?>
		<div class="centro">
		<?php if(!empty($mensaje)):?>
			<div class="mensaje"><?php echo $mensaje;?></div>
		<?php endif;?>
			<form method="post" action="perfil.php">
				<h3>Mi perfil</h3>
				<table>
					<tr>
						<td>
							<label>
								Domicilio
							</label>
						</td>
						<td>
							<input type="text" id="txt-domicilio" name="txt-domicilio" value="<?php echo $resultados[0]["domicilio"] ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>
								CBU
							</label>
						</td>
						<td>
							<input type="text" id="txt-cbu" name="txt-cbu" value="<?php echo $resultados[0]["cbu"] ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Email
							</label>
						</td>
						<td>
							<input type="text" id="txt-email" name="txt-email" value="<?php echo $resultados[0]["email"] ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" value="Modificar" name="btn-modificar" />
						</td>
					</tr>
				</table>
			</form>
			</div>
		</div>
	</body>
</html>
