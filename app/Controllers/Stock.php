<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Stock extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Estoque',
            'page' => 'Estoque',

        ];
        //get all products]
        $product_model = new ProductModel();
        $data['products'] = $product_model->findAll();
        return view('dashboard/stock/index.php', $data);
    }
    public function stock($id)
    {
        $data = [
            'title' => 'Adicionar ao estoque',
            'page' => 'Adicionar ao estoque',
        ];
        $data['validation_errors'] = session()->getFlashdata('validation_errors');
        //get product stock
        $product_model = new ProductModel();
        $data['product'] = $product_model->find($id);
        $data['validation_errors'] = session()->getFlashdata('validation_errors');
        return view('dashboard/stock/adicionar.php', $data);
    }
    function adicionar_submit()
    {
        $id = $this->request->getPost('id_product');
        $validation = $this->validate([
            'quantidade' => [
                'label' => 'Quantidade',
                'rules' => 'required|numeric',
                'errors' => [
                    'numeric' => 'A quantidade deve ser um número',
                    'required' => 'A quantidade é obrigatória'
                ]
            ]
        ]);
        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        $product_model = new ProductModel();
        $product= $product_model->find($id);
        $adicionado = $this->request->getPost('quantidade');

        $new_stock = $product->stock + $adicionado;

        if($product_model->set('stock', $new_stock)->where('id', $id)->update()){
            return redirect()->to(base_url('/stock'));
        }

        return redirect()->back()->withInput()->with('validation_errors', ['quantidade' => 'Não foi possível adicionar o produto ao estoque']);
    }
    public function remover($id){
        $data = [
            'title' => 'Remover do estoque',
            'page' => 'Remover do estoque',
        ];
        $data['validation_errors'] = session()->getFlashdata('validation_errors');
        //get product stock
        $product_model = new ProductModel();
        $data['product'] = $product_model->find($id);
        $data['validation_errors'] = session()->getFlashdata('validation_errors');
        return view('dashboard/stock/remover.php', $data);
    }
    function remover_submit(){
        $id = $this->request->getPost('id_product');
        $validation = $this->validate([
            'quantidade' => [
                'label' => 'Quantidade',
                'rules' =>'required|numeric|greater_than[0]',
                'errors' => [
                    'numeric' => 'A quantidade deve ser um número',
                   'required' => 'A quantidade é obrigatória',
                    'greater_than' => 'A quantidade deve ser maior que 1'
                ]
            ]
        ]);
        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        $product_model = new ProductModel();
        $product= $product_model->find($id);
        $removido = $this->request->getPost('quantidade');

        $new_stock = $product->stock - $removido;
        if($product_model->set('stock', $new_stock)->where('id', $id)->update()){
            return redirect()->to(base_url('/stock'));
        }
        return redirect()->back()->withInput()->with('validation_errors', ['quantidade' => 'Não foi possível remover o produto do estoque']);
    }
    function movimentacao(){
        $data = [
            'title' => 'Movimentação de estoque',
            'page' => 'Movimentação de estoque',
        ];
        $data['validation_errors'] = session()->getFlashdata('validation_errors');
        //get product stock
        $product_model = new ProductModel();
        $data['products'] = $product_model->findAll();
        return view('dashboard/stock/movimentacao.php', $data);
    }
}
