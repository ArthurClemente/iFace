<?php

namespace Projeto\Iface\Modelo\Conta; // Projeto\Iface é o "src" do namespace

require_once 'src/Modelo/Autoloader/autoload.php';

use Projeto\Iface\Modelo\Service\RegistrosLogin;

class Conta
{
    // -----------------Atributos e construtor-----------------
    private $login;
    private $senha;
    private $nomeUsuario;
    private $registro;

    public function __construct(string $login, string $senha, string $nomeUsuario)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->nomeUsuario = $nomeUsuario;
        $this->registro = new RegistrosLogin($login, $nomeUsuario);
    }
// --------------------------------------------------------

// -----------------Getters dos atributos------------------
    public function getLogin(): string
    {
        return $this->login;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getNomeUsuario(): string
    {
        return $this->nomeUsuario;
    }

    public function setNomeUsuario(string $novoNome): void
    {
        $this->nomeUsuario = $novoNome;
    }
// --------------------------------------------------------

// --------------------Funcionalidades---------------------
    public function podeAutenticar(string $login, string $senha): bool // Função que passa para o teste de login da classe Perfil se o email e a senha informados estão corretos.
    {
        return $login === $this->login && $senha === $this->senha;
    }

    public function verificarRegistroEmails(): array // Retorna o array contendo todos os emails registrados de cada instância de Conta.
    {
        return $this->registro->getRegistroEmails();   
    }

    public function verificarRegistroNomes(): array // Retorna o array contendo todos os nomes de usuário registrados de cada instância de Conta.
    {
        return $this->registro->getRegistroNomes();
    }
// --------------------------------------------------------
}