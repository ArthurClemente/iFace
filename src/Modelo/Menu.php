<?php

namespace Projeto\Iface\Modelo;

require_once "src/Modelo/Autoloader/autoload.php";

use Projeto\Iface\Modelo\Conta\Conta;
use Projeto\Iface\Modelo\Conta\Perfil;
use Projeto\Iface\Modelo\Service\ListaRegistros;

class Menu
{

    public function __construct()
    {
        $this->mostrarOpcoesMenu();
    }

    public function mostrarOpcoesMenu(): void
    {
        echo "[ 1 ] Login\n[ 2 ] Registro\n[ 0 ] Sair\nEscolha uma opção: ";
        $escolha = rtrim(fgets(STDIN));// Captura o input do terminal.
        $this->tratarEscolhaMenu($escolha);
    }

    public function tratarEscolhaMenu(string $escolha)
    {
        if($escolha === "1")
        {
            echo PHP_EOL . "Email: ";
            $emailLogin = rtrim(fgets(STDIN));
            echo "Senha: ";
            $senhaLogin = rtrim(fgets(STDIN));
            $this->tentaLogin($emailLogin, $senhaLogin);
        }
        
        else if($escolha === "2")
        {
            echo PHP_EOL . "Email: ";
            $novoEmail = rtrim(fgets(STDIN));
            echo "Senha: ";
            $novaSenha = rtrim(fgets(STDIN));
            echo "Nome de usuário: ";
            $novoNomeDeUsuario = rtrim(fgets(STDIN));
            new Conta($novoEmail, $novaSenha, $novoNomeDeUsuario);
            $this->mostrarOpcoesMenu();
        }

        else if ($escolha === "0")
        {
            echo PHP_EOL . "Saindo do sistema..." . PHP_EOL;
            exit();
        }
        
        else 
        {
            echo PHP_EOL . "Opção inválida, por favor escolha uma das três opções disponíveis." . PHP_EOL;
            $this->mostrarOpcoesMenu();
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
                    echo PHP_EOL . "Login bem sucedido!" . PHP_EOL . PHP_EOL;
                    $perfilLogado = new Perfil($email, $senha, $indiceConta[2]);
                    $perfilLogado->opcoesPerfil();
                }
            }
        }
        echo PHP_EOL . "Dados de login não encontrados ou incorretos!" . PHP_EOL;
        $this->mostrarOpcoesMenu();
    }
}