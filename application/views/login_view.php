<html>
    <head>
        <title> SISP Login </title>
        <link rel="stylesheet" href="<?php echo base_url('css/estilo.css'); ?>" />
    </head>
    <body >
        <div id="fundo_login"></br>
                  <div id="login">

                   <table width="200"   border="0" align="center">
                    <tr>
                        <td>
                            <?php
                            echo form_open('index.php/sisp_controller/valida');?>
                            <h3> <?php echo ('Login:') . '</br>';?></h3></br>
                            <?php echo form_input(array('name'=>'login'),set_value('login'),'autofocus') . '</br>';?>
                            <h5><?php echo form_error('login');?></h5>
                            <h3><?php echo ('Senha:') . '</br>';?></h3></br>
                            <?php echo form_password('senha') . '</br>';?>
                            <h5><?php echo form_error('senha');?></h5>
                            <?php echo form_fieldset_close().'</br>';
                            echo form_submit('submit', 'Entrar');
                            echo form_close();
                            ?> 
                        </td>
                    </tr>
                    
                <?php
if(isset($msg)):
?>
   <span class="formError"><center><h2><?php echo $msg?></h2></center></span><?php
endif;
?>
                    </table>
               <br /><br />
               
                </div>
                     
            </div>
 
</div>
    </body>
</html>