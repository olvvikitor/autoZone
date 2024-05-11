<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        //Validations errors
        $data['validation_errors'] = session()->getFlashdata('validation_errors');

        //login errors
        $data['login_errors'] = session()->getFlashdata('login_errors');
        return view('auth/login_frm', $data);
    }
    public function login_submit()
    {
        //validação de form
        $validation = $this->validate([
            'text_username' => [
                'label' => 'Usuário',
                'rules' => 'required|max_length[16]|min_length[5]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ],
            'text_password' => [
                'label' => 'Senha',
                'rules' => 'required|max_length[16]|min_length[5]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres',
                ]
            ]
        ]);
        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }
        //check login
        $username = $this->request->getPost('text_username');
        $password = $this->request->getPost('text_password');
        $user_model = new UserModel();
        $user = $user_model->check_login($username, $password);

        if (!$user) {
            
            return redirect()->back()->withInput()->with('login_errors', 'Usuario ou senha inválidos.');
        }
        
        //set session
        $user_data = [
            'id' => $user->id,
            'id_endereco' => $user->id_endereco,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->roles,
            'phone' => $user->phone
        ];
        session()->set('user',$user_data);
        return redirect()->to('/');
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
