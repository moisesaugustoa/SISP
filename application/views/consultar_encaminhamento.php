<?php 
include("topo.php");
?>
<a href="<?php echo site_url();  ?>index.php/sisp_controller/consultas"><h3> Voltar</h3></a>
<h1><center>Consultar Encaminhar</center></h1> <br/>

<?php
echo form_open(site_url().'index.php/sisp_controller/consultar_encaminhamento');
echo('CPF: ');
echo form_input(array('name'=>'cpf'),set_value('cpf'),'autofocus') . '<br/>';
echo form_error('cpf');
echo form_submit('submit', 'Pesquisar');
echo form_close();

?>
<?php
  if(isset($encaminhamento)):
?>

  <?php   if(is_array($encaminhamento) && count($encaminhamento)==0): ?>
        <h2> Não há resultados </h2>
    <?php else: 
         $linha = $encaminhamento[0];
    ?>
  <br /> <hr /><center><h3>Resultado</h3></center><hr /> <br />
 <?php 
$tmpl = array ( 'table_open'  => '<table border="2" bgcolor="#DDD" bordercolor = "#060">' );
$this->table->set_template($tmpl);
$this->table->set_heading( 'Paciente', 'CPF', 'Unidade Destinatária', 'Endereço', 'Data', 'Hora');
foreach($encaminhamento as $linha):
    $this->table->add_row($linha->paciente, $linha->cpf,$linha->unidade, $linha->endereco, $linha->data, $linha->hora);
endforeach;
echo $this->table->generate();

?> 

<?php endif; ?>
<?php endif; ?>

<?php 
include("rodape.php");
?>