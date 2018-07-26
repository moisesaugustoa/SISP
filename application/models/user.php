<?php

Class User extends CI_Model{
	
 function login(){

		$this -> db -> where('usuario', $this -> input -> post('login'));
		$this -> db -> where('senha', md5($this -> input -> post('senha')));
		$query = $this -> db -> get('login');
		if ($query -> num_rows == 1) {
			return $query->result();;
		} else{
   		  return false;
   }
 
}
}
 
 
