<?php 
include("topo.php");
?>

<form name="form" method= "post" action="<?php echo site_url(); ?>index.php/sisp_controller/agendar"/>
<center><h1> Agendamento de Consultas </h1></center></br></br>

<hr /><h3>Dados do Paciente</h3><hr />
<br />
Paciente:
<Input type="text" size="45" name="paciente" value="<?php echo set_value('paciente'); ?>"/>
<h5> <?php echo form_error('paciente')  ?></h5>
CPF:
<Input type="text" size="20" name="cpf" value="<?php echo set_value('cpf'); ?>"/>
<h5> <?php echo form_error('cpf')  ?></h5>
<br />
<hr /><h3>Dados do Agendamento</h3><hr />
<br />
Data:
<Input type="text" size="10" name="data" value="<?php echo set_value('data'); ?>"/>
<h5> <?php echo form_error('data')  ?></h5>
Horário:
<Input type="text" size="10" name="hora" value="<?php echo set_value('hora'); ?>"/>
<h5> <?php echo form_error('hora')  ?></h5>
Número da Ficha:
<Input type="text" size="10" name="numero_ficha" value="<?php echo set_value('numero_ficha'); ?>"/>
<h5> <?php echo form_error('numero_ficha')  ?></h5>
Médico:
<Input type="text" size="45" name="medico" value="<?php echo set_value('medico'); ?>"/>
<h5> <?php echo form_error('medico')  ?></h5>
</br></br>
<center><Input type="Submit" value="Salvar" name="Salvar"/></center>


</form>
<?php 
include("rodape.php");
?>
			