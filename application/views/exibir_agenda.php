<?php 
include("topo.php");
?>
<a href="<?php echo site_url(); ?>index.php/sisp_controller/consultas"><h3> Voltar</h3></a>
<center><h1> Consultar Agenda </h1></center></br></br>

<?php
echo form_open(site_url().'index.php/sisp_controller/exibir_agenda');
echo('Data: ');
echo form_input(array('name'=>'data'),set_value('data'),'autofocus') . '<br/>';
echo form_error('data');
echo form_submit('submit', 'Pesquisar');
echo form_close();

?>
<?php
  if(isset($agenda)):
?>

  <?php   if(is_array($agenda) && count($agenda)==0): ?>
        <h2> Não há resultados </h2>
    <?php else: 
         $linha = $agenda[0];
    ?>
   <br /> <hr /><center><h3>Resultado</h3></center><hr /> <br />
	<?php 
$tmpl = array ( 'table_open'  => '<table border="2" bgcolor="#DDD" bordercolor = "#060">' );
$this->table->set_template($tmpl);
$this->table->set_heading('Paciente',  'CPF', 'Data', 'Horário','Número da Ficha', 'Médico');
foreach($agenda as $linha):
    $this->table->add_row($linha->paciente, $linha->cpf,$linha->data, $linha->hora, $linha->numero_ficha, $linha->medico);
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