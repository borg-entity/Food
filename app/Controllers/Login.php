<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function novo()
    {
        $data = [
            'titulo' => 'Realize o  login',
        ];
        
        return view ('Login/novo', $data); 
    }

    public function criar() {
    
        If ($this->request->getMethod() === 'post') {
        
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
                        
             //$autenticacao = \Config\Services::autenticacao();
                                     
            $autenticacao = service('autenticacao');
       
    // dd($this->request->getPost());
       
              if($autenticacao->login($email, $password)) {
                  
                $usuario = $autenticacao->pegaUsuarioLogado();
                                  
               //   return redirect()->to(site_url('admin/home'))->with('sucesso', "Olá $usuario->nome, que bom quem esta de volta");
                              
              } else {
        // dd($this->request->getPost());
        // dd($usuario);
        
               return redirect()->back()->with('atencao','Não encontramos suas credenciais de acesso');    
           }
            
        } else {
        
                 return redirect()->back();       
            
        }    
    } 
}
