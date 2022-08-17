<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="<?php echo CSS_PATH;?>index.tmp.css">
		<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>bootstrap.js"></script>
		<title>Aldeas Inseguras</title>
	</head>
	<body>
		<div class="btn-group panel pull-right">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				<span class="glyphicon glyphicon-user"></span> <?= $template_nombre ?>
			</button>
 
			<ul class="dropdown-menu" role="menu">
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Perfil</a></li>
				<li><a href="#">Configuraci&oacute;n</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo WEB_PATH;?>src/ctl/cerrar_sesion.ctl.php">Cerrar Sesi&oacute;n</a></li>
			</ul>
		</div>
		<div class="container"> 
			<div class="row">
				<div class="col-md-12 text-center ">
					<div class="panel fondo">
						<h2>Aldeas Inseguras <small>Mercado</small></h2>						
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel fondo panel-default">
						<div class="panel-heading">
							<h4 class="text-center">Enviar mercanc&iacute;a</h4>
						</div><!--panel heading-->
						<div class="panel-body">
							<form class="form-horizontal" action="<?php echo WEB_PATH;?>src/ctl/enviar_mercancia.ctl.php" method="POST">
								<input type="hidden" name="id_jugador_origen" value="<?php echo ID_JUGADOR;?>">
								<div class="form-group">
									<label for="select_jugador_destino" class="col-md-4 control-label">Aldea:</label>
									<div class="col-md-8">
										<select id="select_jugador_destino" class="form-control" name="select_jugador_destino">
										<?php
											foreach($template_datos as $jugador):
												if($jugador['id']!= ID_JUGADOR):
										?>
													<option value="<?=$jugador['id']?>"><?=$jugador['nombre']?></option>
										<?php 
												endif;
											endforeach;
										?>
										</select>
									</div>
								</div><!-- form-group-->
								<div class="form-group">
									<label for="txt_cantidad" class="col-md-4 control-label">Cantidad de Oro:</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="txt_cantidad" id="txt_cantidad" maxlength="11" autocomplete="off" pattern="[0-9]+" required />
									</div>
								</div><!-- form-group-->
								<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<button type="submit" class="btn btn-success">Enviar Mercanc&iacute;a</button>
									</div>
								</div><!-- form-group-->
							</form>
						</div><!-- panel-body-->
						<?php if(isset($template_error)):?>
						<div class="panel-footer text-center error">
								<h4><strong><?php echo $template_error ?></strong></h4>
						</div><!-- panel error!!-->
						<?php endif; ?>
					</div><!-- panel -->
				</div>
			</div><!-- row-->
			
			
			
			<div class="row">
				<div class="col-md-4">
					<div class="panel fondo panel-default">
						<div class="panel-heading text-center">
							<h4>Mis recursos</h4>
						</div><!--panel heading-->
						<div class="panel-body">
							<div class="row text-center">
								<div class="col-md-4">
									<div class="thumbnail fondo">
										<img class="img" src="<?php echo IMAGES_PATH?>oro_100.png" alt="Oro"/>
										<div class="caption">
											<h4><span class="label label-success"><?= $template_cantidad_oro?></span></h4>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="thumbnail fondo" >
										<img class="img" src="<?php echo IMAGES_PATH?>plata_100.png" alt="Plata"/>
										<div class="caption">
											<h4><span class="label label-success">150</span></h4>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="thumbnail fondo">
										<img class="img" src="<?php echo IMAGES_PATH?>bronce_100.png" alt="Bronce"/>
										<div class="caption">
											<h4><span class="label label-success">150</span></h4>
										</div>
									</div>
								</div>
							</div><!--row-->
						</div><!--panel body-->
						<?php if(isset($template_mensaje)):?>
						<div class="panel-footer exito text-center">
							<h4><?= $template_mensaje?></h4>
						</div><!-- panel footer-->
						<?php endif; ?>
					</div><!--panel-->
				</div><!--col-->
				<div class="col-md-8">
					<div class="panel panel-default fondo">
						<div class="panel-heading text-center">
							<h4>Recursos de Aldeas cercanas</h4>
						</div><!--panel-heading-->
						<div class="panel-body">
							<table class="table table-bordered table-hover text-center fondo">
								<thead>
									<th class="text-center">Aldea</th>
									<th class="text-center">Oro</th>
									<th class="text-center">Plata</th>
									<th class="text-center">Bronce</th>
								</thead>
								<tbody>
									<?php 
										foreach($template_datos as $jugador): 
											if($jugador['id']!= ID_JUGADOR):
									?>
										<tr>
											<input type="hidden" name="id_jugador" value="<?= $jugador['id']?>" />
											<td><?= $jugador["nombre"]?></td>
											<td><?= $jugador["oro"]?></td>
											<td><?= $jugador["plata"]?></td>
											<td><?= $jugador["bronce"]?></td>
										</tr>
									<?php
											endif;
										endforeach; 
									?>
								</tbody>
							</table>
						</div><!--panel-body-->
					</div><!--panel -->
				</div>
			</div><!--row-->
		</div><!-- container-->
	</body>
</html>