<?php

namespace App\Libraries;

/*
 * @descrção  esta biblioteca /  classe cuidará  da parte  de autenticação  da nossa  aplicação
 */

 class Autenticacao {
    
    private $usuario;
    
    /**
     *
     *@param string $email
     *@param string $passaword
     *@return boolean
     */
    public function login(string $email, string $password) {
            
       $usuarioModel = new \App\Models\UsuarioModel();
       
       $usuario = $usuarioModel->buscaUsuarioPorEmail($email);
       
       if ($usuario === null) {
            
            return false;
       }

       /* Se a senha não combinar com o password_hash, retorna  false */
      
       if (!$usuario->verificaPassword($password)) {
           return false;
       }

       /*  Só permitiremos permitiremos o login de usuários ativos */
       if (!$usuario->ativo){

            return false;
       }
    
       /*  Neste ponto está tudo certo e podemos e podemo logar o usuario  na aplicaçã invocando o método abaixo*/
       $this->logaUsuario($usuario);    
    
       return true; 
    }
        
        
   public function logout () {
    
        session()->destroy();
   }
         
   public function pegaUsuarioLogado() {
        
        
        /* Não esquecer de compartilhar a instancia com services*/
        
        if ($this->usuario === null) {
    
            $this->usuario = $this->pegaUsuarioDaSessao();                     
        }
        
        /* Retornamos o usuário que foi definido no inicio da classe */
        return $this->usuario;
        
   }
   
      /**
    *@descrição: O método só permite ficar logado na aplicação aquele que ainda existir na base e que esteja ativo.
    *            Do contrário, será feito o logout do mesmo, caso haja uma mudança na sua conta durante a sua sessão.
    *
    *@uso: No filtro LoginFilter
    *
    *@return retorna true se o método PegaUsuarioLogado()não for nll. Ou seja, se o usuário estiver logado
    */  
   public function estaLogado() {
    
        /*
         * Não esquecer de compartilhar  a instâncxia com o services
         */
        
        return $this->pegaUsuarioLogado() !== null;
    
   }

   private function pegaUsuarioDaSessao() {
    
        if (!session()->has('usuario_id')) {
            
            return null;
        }
        
        /*  Instanciamos o  Model Usuario*/
        $usuarioModel = new \App\Models\UsuarioModel();
        
        /* Recupero o usuário de acordo com a chave da sessão 'usuario_id'*/
        $usuario = $usuarioModel->find(session()->get('usuario_id'));
        
        /* Só retorno o objeto usuário se o mesmo for encontrado e estiver ativo*/
        if ($usuario && $usuario->ativo) {
            
            return $usuario;
        }
   }

    private function logaUsuario (object $usuario){
        
        $session = session();
        $session->regenerate();
        $session->set('usuario_id', $usuario->id);        
    }
    
    
 }
 