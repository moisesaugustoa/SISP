<?php 
include("topo.php");
?>


<center><h1> Acompanhamento </h1></center> </br></br>
<hr /><h3> Informações do Paciente: </h3><hr/></br>
<form name="form" method= "post" action="<?php echo site_url(); ?>index.php/sisp_controller/acompanhar"/>
						
Paciente:
<Input type="text" size="20" name="paciente" value="<?php echo set_value('paciente'); ?>"/>
<h5> <?php echo form_error('paciente')  ?></h5>
Numero do Cartão:
<Input type="text" size="20" name="numero_cartao" value="<?php echo set_value('numero_cartao'); ?>"/>
<h5> <?php echo form_error('numero_cartao')  ?></h5>
CPF:
<Input type="text" size="20" name="cpf" value="<?php echo set_value('cpf'); ?>"/>
<h5> <?php echo form_error('cpf')  ?></h5>
<hr /> <hr /><br />
Prescricão Médica:<br /><br />
<textarea rows="5" cols="75" name="prescricao_medica" value="<?php echo set_value('prescricao_medica'); ?>"></textarea><br /><br />
<h5> <?php echo form_error('prescricao_medica')  ?></h5>
Observações Adicionais: <br /><br/>
<textarea rows="5" cols="75" name="observacoes_adicionais" value="<?php echo set_value('observacoes_adicionais'); ?>"></textarea> <br /><br />
<h5> <?php echo form_error('observacoes_adicionais')  ?></h5>
<center><Input type="submit" value="    Salvar   " name="salvar"/></center>

</form>
					
				

<?php 
include("rodape.php");
?>
