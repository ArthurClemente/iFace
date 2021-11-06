<?php

namespace Projeto\Iface\Modelo\Conta;

require_once 'src/Modelo/Autoloader/autoload.php';

use Projeto\Iface\Modelo\Conta\Conta;

class Perfil
{

    //-------------------Funções de criação/alteração de atributos do perfil-----------------------
    public function alteraNomeUsuario(Conta $conta, string $novoNome): void
    {
        if ($conta->getNomeUsuario() === $novoNome){
            echo "O nome de usuário informado é igual ao já cadastrado." . PHP_EOL;
        }

        $conta->setNomeUsuario($novoNome);
    }
    //---------------------------------------------------------------------------------------------
}
