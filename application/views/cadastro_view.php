
<?php 
include("topo.php");
?>
					<h1><center>Formulário Cadastrar</center></h1>
					<form name="form" method= "post" action="<?php echo site_url(); ?>index.php/sisp_controller/cadastrar"/>
					Numero do Cartão: </br>
					<Input type="text" size="20" maxlength="10" name="numero_cartao" value="<?php echo set_value('numero_cartao'); ?>"/>
					<h5> <?php echo form_error('numero_cartao')  ?></h5>
					Nome Completo: </br>
					<Input type="text" size="70" name="nome" value="<?php echo set_value('nome'); ?>"/><br/>
					<h5><?php echo form_error('nome')  ?></h5>
					Data de nascimento:
					<Input type="text" size="20"  maxlength="10" name="data_nascimento" value="<?php echo set_value('data_nascimento'); ?>"/>
					<h5><?php echo form_error('data_nascimento')?></h5>
					Sexo:
					<select size="1" name="sexo">
						<option selected  value = "selecione"> Selecione </option>
						<option  value = "feminino"> Feminino </option>
						<option  value = "masculino"> Masculino </option>
					</select>
					<h5><?php echo form_error('sexo')  ?></h5>
					RG:
					<Input type="text" size="20"  maxlength="10" name="rg" value="<?php echo set_value('rg'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
					<h5><?php echo form_error('rg')  ?></h5>
					CPF:
					<input type="text"  maxlength="11" name="cpf" value="<?php echo set_value('cpf'); ?>"/><br/>
					<h5><?php echo form_error('cpf')  ?></h5>
					Naturalidade:
					<Input type="text" size="40" name="naturalidade" value="<?php echo set_value('naturalidade'); ?>"><br/>
					<h5><?php echo form_error('naturalidade')  ?></h5>
			
			Estado:
            <?php
                $options = array ('' => 'Escolha');
                foreach($estados as $estado){
                    $options[$estado->id] = $estado->nome;}
                echo form_dropdown('estado', $options); ?>
                <h5><?php echo form_error('estado')  ?></h5>
            Cidade:
            <?php echo form_dropdown('cidade', array('' => 'Escolha um Estado'), '','id="cidade"');
            ?>
            <h5><?php echo form_error('cidade')  ?></h5>

			<script type="text/javascript" src="<?php echo base_url() . 'js/jquery.js'; ?>"></script>
			<script type="text/javascript" src="<?php echo base_url() . 'js/cep.js'; ?>"></script>
			
<script type="text/javascript">
			    var path = '<?php echo site_url();  ?>'
			</script>
					Rua:
					<Input type="text" size="50" name="rua" value="<?php echo set_value('rua'); ?>" />
					&nbsp;&nbsp;&nbsp;&nbsp;
					<h5><?php echo form_error('rua')  ?></h5>
					Número:
					<Input type="text" size="5" name="numero_casa" value="<?php echo set_value('numero_casa'); ?>"/><br/>
					<h5><?php echo form_error('numero')?></h5>
					Bairro:
					<Input type="text" size="20" name="bairro" value="<?php echo set_value('bairro'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
					<h5><?php echo form_error('bairro')  ?></h5>
					CEP:
					<Input type="text" size="25" name="cep" value="<?php echo set_value('cep'); ?>"/><br/>
					<h5><?php echo form_error('cep')  ?></h5>
					Telefone:
					<Input type="text" size="20" name="telefone" value="<?php echo set_value('telefone'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
					<h5><?php echo form_error('telefone')  ?></h5>
					Celular:
					<Input type="text" size="20" name="celular" value="<?php echo set_value('celular'); ?>"/><br/>
					<h5><?php echo form_error('celular')  ?></h5>
					Nome da mãe:
					<Input type="text" size="70" name="nome_mae" value="<?php echo set_value('nome_mae'); ?>"/><br/>
					<h5><?php echo form_error('nome_mae')  ?></h5>
					Nome do Pai:
					<Input type="text" size="70" name="nome_pai" value="<?php echo set_value('nome_pai'); ?>"/>
					<h5><?php echo form_error('nome_pai')  ?><br/><br/><br/></h5>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" name="enviar"  value="Enviar"/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" name="limpar"  value="Limpar"/>

					</form>
<?php 
include("rodape.php");
?>
