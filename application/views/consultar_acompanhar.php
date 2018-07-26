
<?php 
include("topo.php");
?>
<a href="<?php echo site_url(); ?>index.php/sisp_controller/consultas"><h3> Voltar</h3></a>
<center><h1> Histórico Médico </h1></center></br></br></br>

<?php
echo form_open(site_url().'index.php/sisp_controller/consultar_acompanhar');
echo('CPF: ');
echo form_input(array('name'=>'cpf'),set_value('cpf'),'autofocus') . '<br/>';
echo form_error('cpf');
echo form_submit('submit', 'Pesquisar');
echo form_close();

?>
<?php
  if(isset($acompanhar)):
?>

  <?php   if(is_array($acompanhar) && count($acompanhar)==0): ?>
        <h2> Não há resultados </h2>
    <?php else: 
         $linha = $acompanhar[0];
    ?>
    <br /> <hr /><center><h3>Resultado</h3></center><hr /> <br />  
	<?php 
$tmpl = array ( 'table_open'  => '<table border="2" bgcolor="#DDD" bordercolor = "#060">' );
$this->table->set_template($tmpl);
$this->table->set_heading( 'Paciente', 'Prescricão Médica', 'Observações Adcionais');
foreach($acompanhar as $linha):
    $this->table->add_row($linha->paciente, $linha->prescricao_medica,$linha->observacoes_adicionais);
endforeach;
echo $this->table->generate();

?>
<?php 
endif;
 ?>
<?php  
endif
 ?>
<?php 
include("rodape.php");
?> 
