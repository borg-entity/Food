<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Password extends BaseController
{
    
    private $usuarioModel;
    
    public function  __construct() {
        
        $this->usuarioModel = new \App\Models\UsuarioModel();        
    }
    
    public function esqueci()
    {
        $data = [
            'titulo' => 'Esquerci minha senha',
        ];
        
        return view ('Password/esqueci', $data);
    }
    
    public function processaEsqueci() {
        
        if ($this->request->getMethod() === 'post') {
         
            // dd($this->request->getPost());
        
            $usuario = $this->usuarioModel->buscaUsuarioPorEmail($this->request->getPost('email'));
            
            if ($usuario === null || !$usuario->ativo) {
                
                return redirect()->to(site_url('password/esqueci'))
                                 ->with('atencao','Não encontramos uma conta válida com este email')  
                                 ->withInput(); 
                }
                
                
                 $usuario->iniciaPasswordReset();

                 /*
                  * @ATENÇÃO: Precisamos atualizar o modelo Usuario
                  */
                
                //dd($usuario);

                
                $this->enviaEmailRedefinicaoSenha($usuario);
                //
                return redirect()->to(site_url('login'))->with('sucesso', 'E-mail de redefinição de senha enviado para sua caixa de entrada');
                
        } else {
         /* Não  é POST */
         return redirect()->back();
        }
    }


    private function enviaEmailRedefinicaoSenha(object $usuario) {
        
    
       $email = service('email');


       
    
       $email->setFrom('no-reply@fooddelivery.com.br', 'Food Delivery');
       $email->setTo($usuario->email);

        
        $email->setSubject('Redefinição de senha');
       
        $mensagem = view('Password/reset_email', ['token' => $usuario->reset_token]);

        $email->setMessage($mensagem);
        
        
        $email->send();  
    }

}


