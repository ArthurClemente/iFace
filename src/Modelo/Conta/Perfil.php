<?php

namespace Projeto\Iface\Modelo\Conta;

require_once 'src/Modelo/Autoloader/autoload.php';

use Projeto\Iface\Modelo\Conta\Conta;

class Perfil
{
    // Função que verifica se o login e a senha são iguais aos parâmetros utilizados no construtor da classe Conta.
    public function tentaLogin(Conta $conta, string $login, string $senha): void
    {
        if ($conta->podeAutenticar($login, $senha)) {
            echo "Login efetuado com sucesso!" . PHP_EOL;
        } else {
            echo "Login ou senha incorretos. Tente novamente" . PHP_EOL;
        }
    }

    //-------------------Funções de criação/alteração de atributos do perfil-----------------------
    public function alteraNomeUsuario(Conta $conta, string $novoNome): void
    {
        if ($conta->getNomeUsuario() === $novoNome){
            echo "O nome de usuário informado é igual ao já cadastrado.";
        }

        $conta->setNomeUsuario($novoNome);
    }
    //---------------------------------------------------------------------------------------------
}
