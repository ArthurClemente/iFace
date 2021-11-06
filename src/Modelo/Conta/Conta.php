<?php

namespace Projeto\Iface\Modelo\Conta; // Projeto\Iface é o "src" do namespace

require_once 'src/Modelo/Autoloader/autoload.php';

use Projeto\Iface\Modelo\Service\RegistrosLogin;

class Conta
{
    // -----------------Atributos e construtor-----------------
    private $email;
    private $senha;
    private $nomeUsuario;
    private $registro;

    public function __construct(string $email, string $senha, string $nomeUsuario)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->nomeUsuario = $nomeUsuario;
        $this->registro = new RegistrosLogin($email, $senha, $nomeUsuario);
    }
// --------------------------------------------------------

// -----------------Getters dos atributos------------------
    public function getEmail(): string
    {
        return $this->email;
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

    public function recuperaRegistroContas(): array // Função que recupera o bidimensional que contêm os emails e nomes de usuário cadastrados.
    {
        return $this->registro->getRegistroContas();
    }
// --------------------------------------------------------
}