<?php

namespace Projeto\Iface\Modelo\Conta; // Projeto\Iface é o "src" do namespace

use Projeto\Iface\Modelo\Service\ListaRegistros;

require_once 'src/Modelo/Autoloader/autoload.php';

class Conta
{
    // -----------------Atributos e construtor-----------------
    private $email;
    private $senha;
    private $nomeUsuario;
    private $registroConta;

    public function __construct(string $email, string $senha, string $nomeUsuario)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->nomeUsuario = $nomeUsuario;
        $this->registroConta = new ListaRegistros();
        $this->adicionaDadosConta($email, $senha, $nomeUsuario);
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

    public function adicionaDadosConta(string $email, string $senha, string $nomeUsuario): void
    {
        $this->registroConta->incrementaArrayContas($email, $senha, $nomeUsuario);
    }
    
    public function recuperaRegistroContas(): array // Função que recupera o bidimensional que contêm os emails e nomes de usuário cadastrados.
    {
        return $this->registroConta->getRegistroContas();
    }

// --------------------------------------------------------
}