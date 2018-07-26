<?php 
include("topo.php");

?>
<a href="<?php echo site_url();  ?>index.php/sisp_controller/consultas"><h3> Voltar</h3></a>
<center><h1>Consultar Pacientes</h1></center> <br/>

<?php
echo form_open(site_url().'index.php/sisp_controller/consultar');
echo('CPF: ');
echo form_input(array('name'=>'cpf'),set_value('cpf'),'autofocus') . '<br/>';
echo form_error('cpf');
echo form_submit('submit', 'Pesquisar');
echo form_close();

?>
<?php
  if(isset($pacientes)):
?>

  <?php   if(is_array($pacientes) && count($pacientes)==0): ?>
        <h2> Não há resultados </h2>
    <?php else: 
         $linha = $pacientes[0];
    ?>
  <br /> <hr /><center><h3>Resultado</h3></center><hr /> <br />
    <form name="form" method= "post" action="<?php echo site_url(); ?>index.php/sisp_controller/botoes"/>
    Numero do Cartão: </br>
    <Input type="text" size="20" name="numero_cartao" value="<?php echo $linha->numero_cartao?>" disabled = "disabled"/>
    <h5> <?php echo form_error('numero_cartao')  ?></h5>
    Nome Completo:
    <Input type="text" size="70" name="nome" value="<?php echo set_value('nome', $linha->nome); ?>"/>
    <h5><?php echo form_error('nome')  ?></h5>
    Data de nascimento:
    <Input type="text" size="20" name="data_nascimento" value="<?php echo set_value('data_nascimento', $linha->data_nascimento); ?>" disabled="disable"/>
    <h5><?php echo form_error('data_nascimento')  ?></h5>
    Sexo:
    <Input type="text" size="20" name="sexo" value="<?php echo set_value('sexo', $linha->sexo); ?>"/>
    <h5><?php echo form_error('sexo')  ?></h5>
    RG:
    <Input type="text" size="20" name="rg" value="<?php echo set_value('rg', $linha->rg); ?>"/>
    <h5><?php echo form_error('rg')  ?></h5>
    CPF:
    <input type="text" class="cpf" id="cpf" name="cpf" value="<?php echo set_value('cpf', $linha->cpf); ?>" readonly="true"/>
    <h5><?php echo form_error('cpf')  ?></h5>
    Naturalidade:
    <Input type="text" size="40" name="naturalidade" value="<?php echo set_value('naturalidade', $linha->naturalidade); ?>"/>
    <h5><?php echo form_error('naturalidade')  ?></h5>
    Estado:

    <?php
    $options = array('' => 'Escolha');
    foreach ($estados as $estado) :
            $options[$estado -> id] = $estado -> nome;
    endforeach;
    echo form_dropdown('estado', $options ,$linha->estado);
    ?>
    <h5><?php echo form_error('estado'); ?></h5>
    Cidade:
    <?php echo form_dropdown('cidade', array('' => 'Escolha um Estado'), '', 'id="cidade"', $linha->cidade); ?>
    <h5><?php echo form_error('cidade'); ?></h5>

    <script type="text/javascript" src="<?php echo base_url() . 'js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/cep.js'; ?>"></script>
    <script type="text/javascript">var path ='<?php echo site_url(); ?>'
    </script>

    Rua:
    <Input type="text" size="50" name="rua" value="<?php echo set_value('rua', $linha->rua); ?>"/>
    <h5><?php echo form_error('rua')  ?></h5>
    Número:
    <Input type="text" size="5" name="numero_casa" value="<?php echo set_value('numero_casa', $linha->numero_casa); ?>"/>
    <h5><?php echo form_error('numero')?></h5>
    Bairro:
    <Input type="text" size="20" name="bairro" value="<?php echo set_value('bairro', $linha->bairro); ?>"/>
    <h5><?php echo form_error('bairro')  ?></h5>
    CEP:
    <Input type="text" size="25" name="cep" value="<?php echo set_value('cep', $linha->cep); ?>"/>
    <h5><?php echo form_error('cep')  ?></h5>
    Telefone:
    <Input type="text" size="20" name="telefone" value="<?php echo set_value('telefone', $linha->telefone); ?>"/>
    <h5><?php echo form_error('telefone')  ?></h5>
    Celular:
    <Input type="text" size="20" name="celular" value="<?php echo set_value('celular', $linha->celular); ?>"/>
    <br/>
    <h5><?php echo form_error('celular')  ?></h5>
    Nome da mãe:
    <Input type="text" size="70" name="nome_mae" value="<?php echo set_value('nome_mae', $linha->nome_mae); ?>"/>
    <h5><?php echo form_error('nome_mae')  ?></h5>
    Nome do Pai:
    <Input type="text" size="70" name="nome_pai" value="<?php echo set_value('nome_pai', $linha->nome_pai); ?>"/>
    <h5><?php echo form_error('nome_pai')  ?><br/><br/><br/></h5>
    <br />
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name = btn1 value="Salvar">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name = btn1 value="Excluir">

 <?php endif; ?>

 <?php endif; ?>
<?php 
include("rodape.php");
?>
