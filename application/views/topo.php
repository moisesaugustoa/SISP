<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title><?php  echo $titulo; ?></title>
        <link rel="stylesheet" href="<?php echo base_url('css/estilo.css'); ?>" />
		<script type="text/javascript" src="<?php echo base_url('js/jquery.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/mask.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/jquery.maskedinput.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/jquery-1.2.6.min.js');?>"></script>
               <script type="text/javascript">
$(document).ready(function(){
	$("input.data").mask("99/99/9999");
        $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99.999-999");
});
</script>
	</head>

	<body>
		<div id="fundo">
			<div id="geral">
		<div id="sair">
			 <table width="200"   border="0" align="right">
                    <tr>
                        <td>
		<form name="form" method= "post" action="<?php echo site_url(); ?>index.php/sisp_controller/logout"/>
		<input type="submit" value="  Sair  " name="sair"  >
		 </td>
                    </tr>
                    </table>
		</form>
		</div>		
<div id="menu"><br/>
<img src="../../imagens/logo.png"><br /><br />
<div class="item"><a href="http://localhost/Sisp/index.php/sisp_controller/home"><h4>Home</h4></a></div>
<div class="item"><a href="http://localhost/Sisp/index.php/sisp_controller/cadastrar"><h4>Cadastrar Pacientes</h4></a></div>
<div class="item"><a href ="http://localhost/Sisp/index.php/sisp_controller/consultas"><h4>Consultar</h4></a></div>
<div class="item"><a href ="http://localhost/Sisp/index.php/sisp_controller/salvar_encaminhamento"><h4>Encaminhamento</h4></a></div>
<div class="item"><a href="http://localhost/Sisp/index.php/sisp_controller/acompanhar"><h4>Acompanhamento</h4></a></div>
<div class="item"><a href="http://localhost/Sisp/index.php/sisp_controller/agendar"><h4>Agendamento</h4></a></div>
<div class="item"><a href="http://localhost/Sisp/index.php/sisp_controller/sobre"><h4>Sobre</h4></a></div>
			</div><!-- fim de menu-->
			 <div id= "col1">