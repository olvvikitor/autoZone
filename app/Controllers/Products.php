<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Products',
            'page' => 'Products',

        ];
        //get products]
        $product_model = new ProductModel();
        $data['products'] = $product_model->findAll();

        return view('dashboard/products/index', $data);
    }
    public function new_product()
    {

        $data = [
            'title' => 'Products',
            'page' => 'Cadastro de produto',

        ];
        $data['validation_errors'] = session()->getFlashdata('validation_errors');

        //carrega categoria
        $product_model = new ProductModel();
        $data['categories'] = $product_model->select('category')->distinct()->findAll();
        $data['marcas'] = $product_model->select('marca')->distinct()->findAll();
        $data['cores'] = $product_model->select('color')->distinct()->findAll();

        return view('dashboard/products/new_product_frm', $data);
    }
    public function new_submit()
    {
        //form validation
        $validation = $this->validate([
            'file_img' => [
                'label' => 'Imagem do produto',
                'rules' => [
                    'uploaded[file_img]',
                    'mime_in[file_img,image/png]',
                    'max_size[file_img,500]',
                ],
                'errors' => [
                    'mime_in' => 'O campo {field} deve ser .png ',
                    'max_size' => 'O campo {field} deve ter no máximo 500kb',
                ]

            ],
            'name' => [
                'label' => 'Nome',
                'rules' => 'required|max_length[50]|min_length[2]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'preco' => [
                'label' => 'Preço',
                'rules' => 'required|regex_match[/^\d+\.\d{2}$/]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'regex_max' => 'O campo {field} tem q ser Ex: 1,99',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'cor' => [
                'label' => 'Cor',
                'rules' => 'required|max_length[50]|min_length[0]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'marca' => [
                'label' => 'Marca',
                'rules' => 'required|max_length[50]|min_length[0]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'categoria' => [
                'label' => 'Categoria',
                'rules' => 'required|max_length[50]|min_length[0]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'quantidade' => [
                'label' => 'Quantidade',
                'rules' => 'required|greater_than[1]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'valor_promocional' => [
                'label' => 'Promoção',
                'rules' => 'required|greater_than[-1]|less_than[100]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'estoque_minimo' => [
                'label' => 'Esoque mínimo',
                'rules' => 'required|greater_than[1]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
        ]);
        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }




        $products_model = new ProductModel();
        //checar se existe produto
        $product = $products_model->where('name', $this->request->getPost('name'))->first();
        
        if ($product) {
            return redirect()->back()->withInput()->with('validation_errors', ['name' => 'Já existe um produto com esse nome']);
        }

        //upload image
        $file_img = $this->request->getFile('file_img');
        $file_img->move(ROOTPATH . 'public/assets/images/products', $file_img->getName(), true);
        //preparar para inserir no banco
        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('preco'),
            'description' => $this->request->getPost('descricao'),
            'category' => $this->request->getPost('categoria'),
            'marca' => $this->request->getPost('marca'),
            'cor' => $this->request->getPost('cor'),
            'stock' => $this->request->getPost('quantidade'),
            'promotion' => $this->request->getPost('valor_promocional'),
            'stock_min' => $this->request->getPost('estoque_minimo'),
            'image' => $file_img->getName(),
        ];
        //insert
        $products_model->insert($data);

        return redirect()->to(base_url('/products'));
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Products',
            'page' => 'Edição  de produto',
                ];
        $data['validation_errors'] = session()->getFlashdata('validation_errors');
        $product_model = new ProductModel();
        $data['product'] = $product_model->find($id);

        //carrega categoria
        $data['categories'] = $product_model->select('category')->distinct()->findAll();
        $data['marcas'] = $product_model->select('marca')->distinct()->findAll();
        $data['cores'] = $product_model->select('color')->distinct()->findAll();

        if(!file_exists('./assets/images/products/'. $data['product']->image)){
            $data['product']->image = 'no-image.png';
        }
        
        return view('dashboard/products/edit_frm_product', $data);
    }
    public function edit_submit()
    {
        
        $id = $this->request->getPost('id_product');
        //form validation
        $validation = $this->validate([

            'name' => [
                'label' => 'Nome',
                'rules' => 'required|max_length[50]|min_length[2]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'preco' => [
                'label' => 'Preço',
                'rules' => 'required|regex_match[/^\d+\.\d{2}$/]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'cor' => [
                'label' => 'Cor',
                'rules' => 'required|max_length[50]|min_length[0]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'marca' => [
                'label' => 'Marca',
                'rules' => 'required|max_length[50]|min_length[0]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'categoria' => [
                'label' => 'Categoria',
                'rules' => 'required|max_length[50]|min_length[0]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'valor_promocional' => [
                'label' => 'Promoção',
                'rules' => 'required|greater_than[-1]|less_than[100]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'estoque_minimo' => [
                'label' => 'Esoque mínimo',
                'rules' => 'required|greater_than[1]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
        ]);
        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }
        $products_model = new ProductModel();

        //checar se existe produto
        $product = $products_model->where('name', $this->request->getPost('name'))->where('id != ', $this->request->getPost('id_product'))->first();
        if($product){
            return redirect()->back()->withInput()->with('validation_errors', ['name' => 'Já existe um produto com esse nome']);
        } 
    
   
        //preparar para inserir no banco
        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('preco'),
            'description' => $this->request->getPost('descricao'),
            'category' => $this->request->getPost('categoria'),
            'marca' => $this->request->getPost('marca'),
            'cor' => $this->request->getPost('cor'),
            'promotion' => $this->request->getPost('valor_promocional'),
            'stock_min' => $this->request->getPost('estoque_minimo'),
        ];
        //upload image
        $file_img = $this->request->getFile('file_img');

        if ($file_img && $file_img->getName() != '') {
            // dd($file_img->getName());
            $file_img->move(ROOTPATH . 'public/assets/images/products', $file_img->getName(), true);
            $data['image'] = $file_img->getName(); 
        }
        //update
        $products_model->update($id ,$data);
        return redirect()->to(base_url('/products'));
    }
    public function remove_product($id)
    {

        $products_model = new ProductModel();
        $products_model->delete($id);
        
        return redirect()->to(base_url('/products'));
    }
}
