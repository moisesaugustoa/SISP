<?php 
include ("topo.php");
 ?>
 
<center><h1>Realizar Consultas</h1></center><br /><br />

<ul>
	<li><a href="<?php echo site_url(); ?>index.php/sisp_controller/consultar"><h3> &raquo; Consultar Dados do Pacientes </h3></a></li><br />
	<li><a href="<?php echo site_url(); ?>index.php/sisp_controller/consultar_encaminhamento"><h3> &raquo; Encaminhamento</h3></a></li><br />
	<li><a href="<?php echo site_url(); ?>index.php/sisp_controller/consultar_acompanhar"><h3> &raquo; Consultar Acompanhamento</h3></a></li><br />
    <li><a href="<?php echo site_url(); ?>index.php/sisp_controller/exibir_agenda"><h3>&raquo; Consultar Agendamento</h3></a></li>
	
	
</ul>



<?php 
include ("rodape.php");

 ?>