<?php 
include ('topo.php');
 ?>
 
 <center><h1>Formulário de Encaminhamento</h1></center> <br/>
 <hr /><h3> Dados do Paciente</h3><hr />  <br />
<form name="form" method= "post" action="<?php echo site_url(); ?>index.php/sisp_controller/salvar_encaminhamento"/><br />
CPF:
<Input type="text" size="20" name="cpf" value="<?php echo set_value('cpf'); ?>"/>
<h5> <?php echo form_error('cpf') ?> </h5>
Nome do Paciente:
<Input type="text" size="20" name="paciente" value="<?php echo set_value('paciente'); ?>"/>
<h5> <?php echo form_error('paciente')  ?></h5>
Número do Cartão do SUS:
<Input type="text" size="20" name="numero_cartao" value="<?php echo set_value('numero_cartao'); ?>"/>
<h5> <?php echo form_error('numero_cartao')  ?></h5>
<br />
     <hr /><h3>Dados do Encaminhamento</h3><hr /> <br /> 
Motivo da Solicitação:
<Input type="text" size="70" name="motivo_solicitacao" value="<?php echo set_value('motivo_solicitacao'); ?>"/>
<h5> <?php echo form_error('motivo_solicitacao')  ?></h5>


<?php /* Unidade solicitante:
                $options = array ('' => 'Escolha');
                foreach($unidades as $unidade){
                    $options[$unidade->id] = $unidade->nome;}
                echo form_dropdown('unidade', $options); ?>
                <h5><?php echo form_error('unidade')  */?></h5>

Data:
<Input type="text" size="10" name="data" value="<?php echo set_value('data'); ?>"/>
<h5> <?php echo form_error('data')  ?></h5>
Hora:
<Input type="text" size="10" name="hora" value="<?php echo set_value('hora'); ?>"/>
<h5> <?php echo form_error('hora')  ?></h5>
Unidade Destinatária:
<Input type="text" size="40" name="unidade" value="<?php echo set_value('unidade'); ?>"/>
	<h5><?php echo form_error('unidade')  ?></h5>
 <?php             /*$options = array ('' => 'Escolha');
                foreach($unidades as $unidade){
                    $options[$unidade->id] = $unidade->nome;}
                echo form_dropdown('unidade', $options); ?>
                <h5><?php echo form_error('unidade') */ ?></h5>
          
Endereço:
<Input type="text" size="40" name="endereco" value="<?php echo set_value('endereco'); ?>"/>
	<h5><?php echo form_error('endereco')  ?></h5>
            <?php /* echo form_dropdown('endereco', array(), '','id="endereco"');
            ?>
            <h5><?php echo form_error('endereco')  */?></h5>
            
<br />
<br />
<center><Input type="submit" value="  Salvar  " name="btn1"/><br/><br/><br/></center>
<?php 
include ('rodape.php');

 ?>          
