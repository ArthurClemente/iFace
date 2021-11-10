<?php

namespace Projeto\Iface\Modelo\Conta;

require_once 'src/Modelo/Autoloader/autoload.php';

use Projeto\Iface\Modelo\Comunidade;
use Projeto\Iface\Modelo\Conta\Conta;

class Perfil extends Conta
{
    private $email;
    private $senha;
    private $nomeUsuario;
    public $endereco = array();
    public $telefone;

    public function __construct(string $email, string $senha, string $nomeUsuario)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->nomeUsuario = $nomeUsuario;
    }

    //-------------------Funções de criação/alteração de atributos do perfil-----------------------
    public function opcoesPerfil(): void
    {
        echo "[ 1 ] Alterar nome\n[ 2 ] Adicionar endereço\n[ 3 ] Atualizar endereço\n[ 4 ] Criar Comunidade\n[ 5 ] Verificar dados do perfil\n[ 0 ] Cancelar\nEscolha uma opção: ";
        $escolhaPerfil = rtrim(fgets(STDIN)); // Captura o input do terminal.
        $this->tratarEscolhaPefil($escolhaPerfil);
    }

    public function tratarEscolhaPefil($escolhaPerfil)
    {
        if ($escolhaPerfil === "1") {
            echo "Novo nome de usuário: ";
            $novoNome = rtrim(fgets(STDIN));
            if ($this->nomeUsuario === $novoNome) {
                echo PHP_EOL . "O nome de usuário informado é igual ao já cadastrado." . PHP_EOL . PHP_EOL;
                $this->opcoesPerfil();
            }
            echo PHP_EOL . "Nome alterado de $this->nomeUsuario para $novoNome" . PHP_EOL . PHP_EOL;
            $this->nomeUsuario = $novoNome;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "2") {
            echo "Cidade: ";
            $nomeCidade = rtrim(fgets(STDIN));
            echo "Bairro: ";
            $nomeBairro = rtrim(fgets(STDIN));
            echo "Rua: ";
            $nomeRua = rtrim(fgets(STDIN));
            echo "Número: ";
            $numeroCasa = rtrim(fgets(STDIN));
            array_push($this->endereco, $nomeCidade, $nomeBairro, $nomeRua, $numeroCasa);
            echo PHP_EOL . "Endereço cadastrado!" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "4")
        {
            echo "Nome da comunidade: ";
            $novoNomeComunidade = rtrim(fgets(STDIN));
            echo "Descrição da Comunidade: ";
            $novaDescricao = rtrim(fgets(STDIN));
            new Comunidade($novoNomeComunidade, $novaDescricao);
            echo PHP_EOL . "Comunidade $novoNomeComunidade criada" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "5")
        {
            echo PHP_EOL . "Email: $this->email\nNome de usuário: $this->nomeUsuario" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "0")
        {
            echo "Saindo do sistema..." . PHP_EOL;
            exit();
        }
        
        else 
        {
            echo PHP_EOL . "Opção inválida, por favor escolhaPerfil uma das opções disponíveis." . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }
    }
    //---------------------------------------------------------------------------------------------
}
