<?php

namespace Projeto\Iface\Modelo;

require_once "src/Modelo/Autoloader/autoload.php";

use Projeto\Iface\Modelo\Conta\Conta;
use Projeto\Iface\Modelo\Service\RegistrosLogin;

class Menu
{

    public function __construct()
    {
        $this->mostrarOpcoes();
    }

    public function mostrarOpcoes(): void
    {
        echo "[ 1 ] Login\n[ 2 ] Registro\n[ 0 ] Sair\nEscolha uma opção: ";
        $escolha = rtrim(fgets(STDIN));// Captura o input do terminal.
        $this->tratarEscolha($escolha);
    }

    // Função que verifica se o login e a senha são iguais aos parâmetros utilizados no construtor da classe Conta.
    protected function tentaLogin(string $email, string $senha): void
    {

    }

    public function tratarEscolha(string $escolha)
    {
        if($escolha === "1") // Falta implementar o método de tentar login
        {
            echo "Email: ";
            $this->email = rtrim(fgets(STDIN));
            echo "Senha: ";
            $this->senha = rtrim(fgets(STDIN));
        }
        
        else if($escolha === "2")
        {
            echo "Email: ";
            $novoEmail = rtrim(fgets(STDIN));
            echo "Senha: ";
            $novaSenha = rtrim(fgets(STDIN));
            echo "Nome de usuário: ";
            $novoNomeDeUsuario = rtrim(fgets(STDIN));
            new Conta($novoEmail, $novaSenha, $novoNomeDeUsuario);
        }

        else if ($escolha === "0")
        {
            echo "Saindo do sistema...";
            exit();
        }
        
        else 
        {
            echo PHP_EOL . "Opção inválida, por favor escolha uma das três opções disponíveis." . PHP_EOL;
            $this->mostrarOpcoes();
        }
    }
}