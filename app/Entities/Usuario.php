<?php

namespace App\Entities;

use CodeIgniter\Entity;

use App\Libraries\Token;


class Usuario extends Entity {
    
    protected $dates  = [
        'criado_em',
        'atualizado_em',
        'deletado_em',
    ];

    public function verificaPassword(string $password) {
        
        return password_verify($password, $this->password_hash);
    }

    public function iniciaPasswordReset() {
        
        /* Istancio novo objetop da  classe Token */        
        $token = new Token();
        
        /**
         * @Descrição: Atribuimos ao objeto Entitie Usuario ($this) o atributo 'reset_token' que conterá o token gerado
         *             para que possamos acessá-lo na view 'Password/reset_email'
         */
        $this->reset_token = $token->getValue(); 

         /**
         * @Descrição: Atribuimos ao objeto Entitie Usuario ($this) o atributo 'reset_hash' que conterá o hash do token
         */
        $this->reset_hash = $token->getHash();

        /**
         * @Descrição: Atribuimos ao objeto Entitie Usuario ($this) o atributo 'reset_expira_em' que conterá a data de expiração do Token gerado
         */       
        $this->reset_expira_em = date('Y-m-d H:i:s', time() + 7200); //Expira em 2 hs a partir da data e hora  atuais  
    }

}