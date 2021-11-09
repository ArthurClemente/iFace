<?php

namespace Projeto\Iface\Modelo;

require_once "src/Modelo/Autoloader/autoload.php";

use Projeto\Iface\Modelo\Conta\Conta;
use Projeto\Iface\Modelo\Service\ListaRegistros;

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

    public function tratarEscolha(string $escolha)
    {
        if($escolha === "1") // Falta implementar o método de tentar login
        {
            echo "Email: ";
            $emailLogin = rtrim(fgets(STDIN));
            echo "Senha: ";
            $senhaLogin = rtrim(fgets(STDIN));
            $this->tentaLogin($emailLogin, $senhaLogin);
            $this->mostrarOpcoes();
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
            $this->mostrarOpcoes();
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

    public function tentaLogin(string $email, string $senha): void
    {
        $registro = new ListaRegistros();
        $registrosContas = $registro->getRegistroContas();
        foreach($registrosContas as $indiceConta) {
            for($dadosDaConta = 0; $dadosDaConta < 3; $dadosDaConta++) {
                if($indiceConta[0] === $email && $indiceConta[1] === $senha)
                {
                    echo "Login bem sucedido!";
                }
            }
        }
        echo "Dados de login não encontrados ou incorretos!" . PHP_EOL;
    }
}