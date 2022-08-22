<?php 
require_once("comun.php");

$nombre_usuario = "";
if(isset($_SESSION["id_usuario"])){
	$consulta = "SELECT nombre FROM usuarios WHERE id = {$_SESSION["id_usuario"]}";
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
if(isset($_POST["btnEnviar"])){
	if(isset($_POST["txtComentario"]) && !empty($_POST["txtComentario"])){
		global $conexion;
		$insercion = "INSERT INTO comentarios (comentario, id_usuario) VALUES ('{$_POST["txtComentario"]}',{$_SESSION["id_usuario"]})";
		if ($conexion->query($insercion)) {
			$mensaje = "Comentario cargado";
		}else{
			
			$mensaje = "Error al tratar de cargar comentario: ".$conexion->error;
		}
	}
}
$consulta = "SELECT nombre as nombre_usuario, comentario FROM comentarios c INNER JOIN  usuarios u ON c.id_usuario = u.id";
$conjunto_resultados = $conexion->query($consulta);
$resultados = array();
if ($conjunto_resultados !== false) {
	for ($i = 0; $i < $conjunto_resultados->num_rows; $i++) {
		$resultados[] = $conjunto_resultados->fetch_assoc();
	}
}
$comentarios = $resultados;

?>
<html>
	<head>
		<title>XSS Directo</title>
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
			<form method="post" action="comentarios.php">
				<h3>Comentar</h3>
				<table>
					<tr>
						<td>
							<label>
								Comentario:
							</label>
						</td>
						<td>
							<textarea name="txtComentario" style="width:600px;height:200px;resize:none;padding:5px;"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" value="Enviar comentario" name="btnEnviar"/>
						</td>
					</tr>
				</table>
			</form>
			<?php if(isset($comentarios) && !empty($comentarios)):?>
			<br/>
			<h3>Comentarios realizados</h3>
				<table>
					<?php foreach($comentarios as $comentario): ?>
						<tr>
							<td>
								<span style="text-decoration:underline">Usuario: <?php echo $comentario["nombre_usuario"]; ?></span>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $comentario["comentario"]; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
			</div>
		</div>
	</body>
</html>