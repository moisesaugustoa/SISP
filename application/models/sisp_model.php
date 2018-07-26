<?php

class Sisp_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

function login($username, $password){
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else{
     return false;
   }
 }




	function do_insert($dados = NULL) {
		if ($dados != NULL) :
			//print_r($dados);
			$this -> db -> insert('formulario_cadastro', $dados);
			//$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso' );
			redirect('index.php/sisp_controller/home');
		endif;
	}
        function get_all(){
       return $this->db->get('agendamento');
   }
	function insert($dados = NULL) {
		if ($dados != NULL) :
			$this -> db -> insert('encaminhar', $dados);
			//$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso' );
			redirect('index.php/sisp_controller/home');
		endif;
	}

function unidades(){
	return $this->db->get('unidades') ->result();
}	
	function getEstados() {
		
		return $this->db->get('estados')->result();
		
	}


	function getEndereco ($id = null){
		$result= $this->db->select('local')
				 		->from('unidades')
						->where(array('id' => $id))
						->get()->result();	
		
		return $result;
			
	}
		
	function getCidades($id = null) {
		
		if(!is_null($id))
			$this->db->where( array('estados.id' => $id) );
		return $this->db->select('cidades.id, cidades.nome')
				 		->from('estados')
				 		->join('cidades', 'cidades.id_uf = estados.id')
						->get()->result();
		
	}
	
	

	function do_update($dados = NULL) {
		if ($dados != NULL) :
			//$this -> db -> where('dados', $dados);
			$this -> db -> update('formulario_cadastro', $dados);
		endif;
	}

	function get_bydata($data) {
	if ($data != NULL) :
			$this -> db -> where('data', $data);
			$result = $this -> db -> get('agendamento')-> result();
			return $result;
		else :
			return FALSE;
		endif;

	}	
	

	function get_byCPF($cpf) {

		if ($cpf != NULL) :
			$this -> db -> where('cpf', $cpf);
			$this -> db -> limit(1);
			$result = $this -> db -> get('formulario_cadastro')-> result();
			return $result;
		else :
			return FALSE;
		endif;

	}
function get_byCPF_encaminhar($cpf) {

		if ($cpf != NULL) :
			$this -> db -> where('cpf', $cpf);
			$result = $this -> db -> get('encaminhar')-> result();
			return $result;
		else :
			return FALSE;
		endif;


	}

	function do_delete($cpf = NULL) {
		if ($cpf != NULL) :
                        $this -> db -> where('cpf', $cpf);
			$this -> db -> delete('formulario_cadastro');
		endif;
	}
		function insert_agenda($dados = NULL) {
		if ($dados != NULL) :
			$this -> db -> insert('agendamento', $dados);
			//$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso' );
			redirect('index.php/sisp_controller/home');
		endif;
	}
		
		function insert_acompanhar($dados = NULL) {
		if ($dados != NULL) :
			$this -> db -> insert('acompanhamento', $dados);
			//$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso' );
			redirect('index.php/sisp_controller/home');
		endif;
	}

	function get_bycpf_acompanhar($cpf) {

		if ($cpf != NULL) :
			$this -> db -> where('cpf', $cpf);
			$result = $this -> db -> get('acompanhamento')-> result();
			return $result;
		else :
			return FALSE;
		endif;

	}
	

}