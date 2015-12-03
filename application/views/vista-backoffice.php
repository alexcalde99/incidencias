<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
if (!isset($css_files)) {
    $css_files=array();
    
    
}
if(!isset($js_files)){
    $js_files = array();
}

foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
<?php echo "<h3>Bienvenido al mantenimiento de incidencias</h3>"; ?>
	<div>
		<a href='<?php echo site_url('backoffice/crud_usuarios')?>'>Usuarios</a> |
		<a href='<?php echo site_url('backoffice/crud_incidencias')?>'>Incidencias</a> |
		<a href='<?php echo site_url('backoffice/')?>'>Roles</a> |
		<a href='<?php echo site_url('backoffice/')?>'>Tipo de Incidencias</a> |
		<a href='<?php echo site_url('backoffice/')?>'>Historico de Incidencias</a> |
		<a href='<?php echo site_url('backoffice/')?>'>Salir</a> |


		
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php if(isset($output)){
			echo $output;
		}; ?>
    </div>
</body>
</html>
