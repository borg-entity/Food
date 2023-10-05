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
  
             
        //       dd($usuario->verificaPassword($password));
                     
      //      dd($autenticacao);
            
    // dd($this->request->getPost());
    
              if($autenticacao->login($email, $password)) {
 
               
                     $usuario = $autenticacao->pegaUsuarioLogado();
  
                     
                     if  (!$usuario->is_Admin) {
                            
                            return redirect()->to(site_url('/'));       
                     }
                     
                     return redirect()->to(site_url('admin/home'))->with('sucesso', "Olá $usuario->nome, que bom quem esta de volta");
                              
              } else {
         
      

        // dd($usuario);
        
               return redirect()->back()->with('atencao','Não encontramos suas credenciais de acesso');    
           }
            
        } else {
        
                 return redirect()->back();       
            
        }    
    } 

    /**
     * Para que possamos exibir a mensagem de 'Sua  sessão expirou',
     * Apóso Logout, devemos fazer uma requisição para uma URL, nessse caso  a 'showLogoutMessage'
     * Pois quando fazemos o lLogout, todos os dados da sessão atual, incluindo a flashdata são destruídos.
     * Ou seja, as mensagens nuncas serão exibidas.
     *
     * Portanto para que conseguirmos exibí-las, basta criarmos o método 'showLogoutMessage' que fará o redirect para a Hone,
     *  Com a mensagem desejada
     *
     *  E como se trata de um redirect, a mensagem só será exibida uma vez
     */
    
    public function logout() {
        
        service('autenticacao')->logout();
        
        return redirect()->to(site_url('login/mostraMensagemLogout'));
    }
    
    public function mostraMensagemLogout() {
        
        return redirect()->to(site_url("login"))->with('info', 'Esperamos ver você novamente');
    }
    

}
