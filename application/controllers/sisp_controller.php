<?php


class Sisp_controller extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> helper('url');
		$this -> load -> helper('array');
		$this -> load -> library('table');
        $this -> load -> library('session');
		$this -> load -> model('sisp_model');
       	$this->load->model('user','',TRUE);
		
	}

function index(){
		$info['msg'] = "";
		$this->load->view('login_view', $info);
			
	}
	
	public function valida(){
	
		$this->load->model('user');//Carrega o model
		$query = $this->user->login();//Chama a função da Model que checa o usuário no BD
		
		if($query) //Se o Usuário e senha existir no mesmo registro...
		{
			$data = array(
				'login' => $this->input->post('login'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			$this->home();
		}else // incorrect username or password
		{
			$info['msg'] = "Dados incorretos. Tente Novamente!";
			$this->load->view('login_view', $info);
		
		}
	
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('index.php/sisp_controller');
		
	}


function verificaLogado(){
	if(!$this->session->userdata('is_logged_in')){
			$info['msg'] = "Você não tem permissão para acessar a página.";
			$this->load->view('login_view', $info);
	
	}
}
	function home() {
		$dados = array('titulo' => 'Sisp &raquo; Home' );
       $this->load->view('inicial_view', $dados);
      
	}

	function consultas(){	

	   	$dados = array('titulo' => 'Sisp &raquo; Consultas' );
		$this->load->view('consultas', $dados);
	}


	function getCidades($id) {
		
		$this->load->model('sisp_model');
		
		$cidades = $this->sisp_model->getCidades($id);
		
		if( empty ( $cidades ) ) 
			return '{ "nome": "Nenhuma cidade encontrada" }';
		$arr_cidade = array();

		foreach ($cidades as $cidade) {
			
			$arr_cidade[] = '{"id":' . $cidade->id . ',"nome":"' . $cidade->nome . '"}';
				
		}
		
		echo '[ ' . implode(",",$arr_cidade) . ']';
		
		return;
		
	}
	
	function getEndereco($id) {
		
		$this->load->model('sisp_model');
		
		$endereco = $this->sisp_model->getEndereco($id);
		
		if( empty ( $endereco) ) 
			return '{ "local": "" }';
		
		$arr_endereco = array();

		foreach ($endereco as $endereco) {
			
			$arr_endereco[] = '{"local":"' . $endereco->local . '"}';
				
		}
		
		echo '[ ' . implode(",",$arr_endereco) . ']';
		
		return;
		
	}


	function cadastrar() { 


		$this -> form_validation -> set_rules('numero_cartao', 'CARTÃO DO SUS', 'trim|required|max_length[15]|numeric');
		$this -> form_validation -> set_rules('nome', 'NOME COMPLETO', 'trim|required|max_length[50]|ucwords');
		$this -> form_validation -> set_rules('data_nascimento', 'DATA DE NASCIMENTO', 'trim|required|max_length[10]');
		$this -> form_validation -> set_rules('rg', 'RG', 'trim|required|strtolower');
		$this -> form_validation -> set_rules('cpf', 'CPF', 'trim|required|max_length[15]');
		$this -> form_validation -> set_rules('sexo', 'SEXO', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('estado', 'ESTADO', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('cidade', 'CIDADE', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('naturalidade', 'naturalidade', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('rua', 'RUA', 'trim|required|max_length[150]|ucwords');
		$this -> form_validation -> set_rules('numero_casa', 'NÚMERO DA CASA', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('bairro', 'BAIRRO', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('cep', 'CEP', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('telefone', 'TELEFONE', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('celular', 'CELULAR', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('nome_mae', 'NOME DA MÃE', 'trim|required|max_length[100]|ucwords');
		$this -> form_validation -> set_rules('nome_pai', 'NOME DO PAI', 'trim|required|max_length[100]|ucwords');

		
		$this -> load -> helper('array');
		$dados = array('titulo'=> 'Sisp &raquo; Cadastrar');
		$this -> load -> model('sisp_model');
		$dados['estados'] = $this->sisp_model->getEstados();

		if ($this -> form_validation -> run() == TRUE) :

			$dados = elements(array('numero_cartao', 'nome', 'data_nascimento', 'rg', 'cpf', 'sexo', 'estado', 'cidade', 'naturalidade', 'rua', 'numero_casa', 'bairro', 'cep', 'telefone', 'celular', 'nome_mae', 'nome_pai'), $this -> input -> post());
			
			$this -> sisp_model -> do_insert($dados);
		else :

			$dados['estados'] = $this -> sisp_model -> getEstados();

		endif;

		$this -> load -> view('cadastro_view', $dados);
	}

     
	function consultar() {
			$dados=array('titulo'=> 'Sisp &raquo; Consultar');
		$this -> load -> model('sisp_model');
		$cpf = $this -> input -> post("cpf");
               $dados = array();
                if(isset($cpf) && !empty ($cpf)){
                   $dados = array('pacientes' => $this -> sisp_model -> get_byCPF($cpf),$this -> input -> post());
                   $dados['estados'] = $this -> sisp_model -> getEstados();
                }
		$this -> load -> view('consulta_dados', $dados);
	}

	function consultar_encaminhamento() {
	$dados = array('titulo'=> 'Sisp &raquo; Encaminhamento');
	$this -> load -> model('sisp_model');
	$cpf = $this -> input -> post("cpf");
    $dados = array();
     if(isset($cpf) && !empty ($cpf)){
    $dados = array('encaminhamento' => $this -> sisp_model -> get_byCPF_encaminhar($cpf),$this -> input -> post());
  
                }
	 $this->load->view('consultar_encaminhamento', $dados);
	}
	function salvar_encaminhamento(){
	$dados = array('titulo'=> 'Sisp &raquo; Encaminhamento');
	 $this -> form_validation -> set_rules('paciente', 'PACIENTE', 'trim|required|max_length[200]|ucwords');
	 $this -> form_validation -> set_rules('numero_cartao', 'CARTÃO DO SUS', 'trim|required|max_length[15]|numeric');
	 $this -> form_validation -> set_rules('cpf', 'CPF', 'trim|required|max_length[15]');	
	 $this -> form_validation -> set_rules('motivo_solicitacao', 'MOTIVO DA SOLICITAÇÃO', 'trim|required|ucwords');
	 //$this -> form_validation -> set_rules('unidade', 'UNIDADE SOLICITANTE', 'trim|required|ucwords');
	 $this -> form_validation -> set_rules('unidade', 'UNIDADE DESTINATARIA', 'trim|required|ucwords');	 
	 $this -> form_validation -> set_rules('data', 'DATA', 'trim|required');
	 $this -> form_validation -> set_rules('hora', 'HORA', 'trim|required');
	 $this -> form_validation -> set_rules('endereco', 'ENDEREÇO', 'trim|required|ucwords');
	 
	 
	 if ($this -> form_validation -> run() == TRUE) :
			$dados = elements(array('paciente','numero_cartao','cpf','motivo_solicitacao', 'unidade', 'data', 'hora',
			 'endereco'), $this -> input -> post());
			$this -> sisp_model -> insert($dados);
			
		endif;
	
	$this -> load -> view('salvar_encaminhamento', $dados);

	}

	function agendar(){
	
		$this -> form_validation -> set_rules('data', 'DATA', 'trim|required|max_length[15]');
		$this -> form_validation -> set_rules('hora', 'HORÁRIO', 'trim|required|max_length[15]');
		$this -> form_validation -> set_rules('numero_ficha', 'NÚMERO DA FICHA', 'trim|required|max_length[3]|numeric');
		$this -> form_validation -> set_rules('medico', 'MÉDICO', 'trim|required|max_length[200]|ucwords');
		$this -> form_validation -> set_rules('paciente', 'PACIENTE', 'trim|required|max_length[200]|ucwords');
		$this -> form_validation -> set_rules('cpf', 'CPF', 'trim|required|max_length[15]');
		
		$dados = array('titulo' => 'Sisp &raquo; Agendar');

	if ($this -> form_validation -> run() == TRUE) :

			$dados = elements(array('data', 'hora', 'numero_ficha', 'medico', 'paciente','cpf'), $this -> input -> post());
			$this -> sisp_model -> insert_agenda($dados);

		endif;
		
		$this->load->view('agendamento', $dados);
	}

	function exibir_agenda(){
		
		$dados = array('titulo'=> 'Sisp &raquo; Exibir Agenda' );
		$this -> load -> model('sisp_model');
		$data = $this -> input -> post("data");
		$dados = array();
			if (isset($data)&& !empty($data)) {
        $dados = array('agenda' => $this -> sisp_model -> get_bydata($data), $this -> input -> post());		
			}
				
		$this->load->view('exibir_agenda', $dados);
	}

function acompanhar() {
		$this -> form_validation -> set_rules('paciente', 'PACIENTE', 'trim|required|max_length[200]|ucwords');
		$this -> form_validation -> set_rules('numero_cartao', 'CARTÃO DO SUS', 'trim|required|max_length[15]|numeric');
		$this -> form_validation -> set_rules('cpf', 'CPF', 'trim|required|max_length[15]');
		$this -> form_validation -> set_rules('prescricao_medica', 'PRESCRIÇÃO MÉDICA', 'trim|required|max_length[200]');
		$this -> form_validation -> set_rules('observacoes_adicionais', 'OBSERVAÇÕES ADICIONAIS', 'trim|required|max_length[200]');
		
		$dados = array('titulo' => 'Sisp &raquo; Acompanhamento');

				if ($this -> form_validation -> run() == TRUE) :
			$dados = elements(array('paciente', 'numero_cartao','cpf','prescricao_medica', 'observacoes_adicionais'), $this -> input -> post());
			$this -> sisp_model -> insert_acompanhar($dados);

				endif;
		
	    $this->load->view('acompanhamento', $dados);	
	}
	
	function consultar_acompanhar(){
		$dados = array('titulo'=> 'Sisp &raquo; Acompanhamento' );
		$this -> load -> model('sisp_model');
		$cpf = $this -> input -> post("cpf");
		$dados = array();
			if (isset($cpf)&& !empty($cpf)) {
        $dados = array('acompanhar' => $this -> sisp_model -> get_bycpf_acompanhar($cpf), $this -> input -> post());		
			}
				
		$this->load->view('consultar_acompanhar', $dados);
	}
	
	function sobre(){
		$dados = array('titulo' => 'Sisp &raquo; Sobre' );
			$this->load->view('sobre', $dados);
		
		
	}
	function botoes(){
				
	$txtbus = "";		
	if(isset($_POST["btn1"])){
		$btn=$_POST["btn1"];
	if(isset($_POST["txtbus"])):
		$bus = $_POST["txtbus"];
	endif;

	if($btn=="Salvar"){
	
		$this -> form_validation -> set_rules('nome', 'NOME COMPLETO', 'trim|required|max_length[50]|ucwords');
		$this -> form_validation -> set_rules('rg', 'RG', 'trim|required|strtolower');
		$this -> form_validation -> set_rules('sexo', 'SEXO', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('estado', 'ESTADO', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('cidade', 'CIDADE', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('naturalidade', 'naturalidade', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('rua', 'RUA', 'trim|required|max_length[150]|ucwords');
		$this -> form_validation -> set_rules('numero_casa', 'NÚMERO DA CASA', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('bairro', 'BAIRRO', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('cep', 'CEP', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('telefone', 'TELEFONE', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('celular', 'CELULAR', 'trim|required|max_length[15]|ucwords');
		$this -> form_validation -> set_rules('nome_mae', 'NOME DA MÃE', 'trim|required|max_length[100]|ucwords');
		$this -> form_validation -> set_rules('nome_pai', 'NOME DO PAI', 'trim|required|max_length[100]|ucwords');
                
		$this -> load -> helper('array');
		$this -> load -> model('sisp_model');
		$dados['estados'] = $this->sisp_model->getEstados();

		if ($this -> form_validation -> run() == TRUE) :

			$dados = elements(array('nome','rg','sexo', 'estado', 'cidade', 'naturalidade', 'rua', 'numero_casa', 'bairro', 'cep', 'telefone', 'celular', 'nome_mae', 'nome_pai'), $this -> input -> post());
			
			$this -> sisp_model -> do_update($dados);
		else :

			$dados['estados'] = $this -> sisp_model -> getEstados();

		endif;

		redirect("index.php/sisp_controller/home");
	}

	
	if($btn=="Excluir") {
                $cpf = $_POST["cpf"];
                $this->load->model("sisp_model");
                try{
                    $this->sisp_model->do_delete($cpf);
                    
                }catch(Exception $e){
                    
                }
                redirect("index.php/sisp_controller/home");
	}
}
	
	}
	}
	