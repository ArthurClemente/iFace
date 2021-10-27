<?php

namespace Projeto\Iface\Modelo\Service;

use Projeto\Iface\Modelo\Autenticavel; // Utilização da classe autenticavel por meio da namespace.

class Autenticador
{
    public function tentaLogin(Autenticavel $autenticador, string $login, string $senha): void // Função que verifica se o login e a senha foram informados corretamente.
    {
        if ($autenticador->podeAutenticar($login, $senha)){
            echo "Login efetuado com sucesso!";
        }else{
            echo "Login ou senha incorretos. Tente novamente";
        }
    }
}