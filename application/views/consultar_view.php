<?php 
include("topo.php");
?>

<center><h1>Consultar Pacientes</h1></center> <br/>

<?php
echo form_open(site_url().'index.php/sisp_controller/consultar');
echo('CPF: ');
	echo form_input('cpf') . '<br/>';
	echo form_error('cpf');
	echo form_submit('submit', 'Pesquisar');
	echo form_close();

?>

<?php 
include("rodape.php");
?>
			