<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loja_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	// aqui vai criar uma função com o nome que foi definido no controller

	public function novoProduto($dados)
	{
		$this->db->insert('produto', $dados); 
	
		if ($this->db->affected_rows() > 0) {
			// Inserção bem-sucedida
			return [
				'success' => true,
				'message' => 'Produto cadastrado com sucesso!'
			];
		} else {
			// Inserção falhou
			return [
				'success' => false,
				'message' => 'Erro ao cadastrar o produto. Por favor, tente novamente.'
			];
		}
	}

	public function listarProdutos($id_usuario){ 
		$this->db->select('*');
		$this->db->from('produto');
		$this->db->where('id_usuario_loja', $id_usuario);

		return $this->db->get()->result_array();
	} 

    public function removerProduto($id_produto){
        $this->db->where('id_produto', $id_produto);
        $this->db->delete('produto');

		if ($this->db->affected_rows() > 0) {
			// Remoção bem-sucedida
			return [
				'success' => true,
				'message' => 'Produto removido com sucesso!'
			];
		} else {
			// Remoção falhou
			return [
				'success' => false,
				'message' => 'Erro ao remover o produto. Por favor, tente novamente.'
			];
		}
	}
	public function editarProduto ($dados) {
		$this->db->where('id_produto', $dados["id_produto"]);
		$this->db->update('produto', $dados);

		if ($this->db->affected_rows() > 0) {
          // Edição bem-sucedida
			return [
				'success' => true,
				'message' => 'Produto editado com sucesso!'
		    ];
		} else {
			// Edição falhou
			return [
				'success' => false,
				'message' => 'Erro ao editar o produto. Por favor, tente novamente.'
			];
		}
			
			
	
			

	}
}
