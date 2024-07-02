<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template'); //Carrega a biblioteca de template
		$this->load->model('Loja_model'); //Carrega o modelo de Loja
	}

	public function index()
	{
		$dados = [
			'title' => 'Produtos',
			'produtos' => $this->Loja_model->listarProdutos($this->session->id_usuario)
		];
		
		$this->template->load('lojaPaginaPrincipal', $dados);
	}

	public function cadastro() 
	{
		
		$this->template->load('lojaCadastro');
	}

	public function ajax_novoProduto() { // ajax_novoProduto é o nome que foi criado 
		$id_usuario_loja = $this->session->id_usuario;
		$nome = $this->input->post('nome');
		$custo = $this->input->post('custo');
		$preco = $this->input->post('preco');
		$descricao = $this->input->post('descricao');
		$estoque =  $this->input->post('estoque');
			
		$dados = [
			'id_usuario_loja' => $id_usuario_loja,
			'nome' => $nome,
			'custo' => $custo,
			'preco' => $preco,
			'descricao' => $descricao,
			'estoque' => $estoque
		];
    
		$resultado = $this->Loja_model->novoProduto($dados);

		echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
	}
	public function editar($id_produto) {

		$dados["id_produto"] = $id_produto;
		$this->template->load('lojaEdicao', $dados);


		

	}

	public function ajax_editarProduto() {
		$dados = array(
			'id_produto' => $this->input->post('id_produto'),
			'id_usuario_loja' => $this->session->id_usuario,
			'nome' => $this->input->post('nome'),
			'custo' => $this->input->post('custo'),
			'preco' => $this->input->post('preco'),
			'estoque' => $this->input->post('estoque'),
			'descricao' => $this->input->post('descricao'),
		);
	
		
		$resultado = $this->Loja_model->editarProduto($dados);
	
		echo json_encode($resultado);
	}

	

	public function remover(){
		$id_produto = $this->input->post('id_produto');
		$resultado = $this->Loja_model->removerProduto($id_produto);

		echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

	
	} 
    
}
