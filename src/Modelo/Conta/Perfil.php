<?php

namespace Projeto\Iface\Modelo\Conta;

require_once 'src/Modelo/Autoloader/autoload.php';

use Projeto\Iface\Modelo\Comunidade;
use Projeto\Iface\Modelo\Conta\Conta;
use Projeto\Iface\Modelo\Menu;

class Perfil extends Conta
{
    private $email;
    private $senha;
    private $nomeUsuario;
    public $listaEndereco = array();
    public $telefone;
    private $registrosComunidades = array();

    public function __construct(string $email, string $senha, string $nomeUsuario)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->nomeUsuario = $nomeUsuario;
    }

    //-------------------Funções de criação/alteração de atributos do perfil-----------------------
    public function opcoesPerfil(): void
    {
        echo "[ 1 ] Alterar nome\n[ 2 ] Adicionar endereço\n[ 3 ] Gerenciar endereço\n[ 4 ] Criar Comunidade\n[ 5 ] Verificar dados do perfil\n[ 6 ] Verificar dados da comunidade\n[ 7 ] Fazer LogOff\n[ 0 ] Sair\nEscolha uma opção: ";
        $escolhaPerfil = rtrim(fgets(STDIN)); // Captura o input do terminal.

        $this->tratarEscolhaPefil($escolhaPerfil);
    }

    public function tratarEscolhaPefil($escolhaPerfil)
    {
        if ($escolhaPerfil === "1") 
        {
            echo PHP_EOL . "Novo nome de usuário: ";
            $novoNome = rtrim(fgets(STDIN));

            if ($this->nomeUsuario === $novoNome) {
                echo PHP_EOL . "O nome de usuário informado é igual ao já cadastrado." . PHP_EOL . PHP_EOL;
                $this->opcoesPerfil();
            }
            echo PHP_EOL . "Nome alterado de $this->nomeUsuario para $novoNome" . PHP_EOL . PHP_EOL;
            $this->nomeUsuario = $novoNome;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "2") 
        {
            echo PHP_EOL . "Cidade: ";
            $nomeCidade = rtrim(fgets(STDIN));
            echo "Bairro: ";
            $nomeBairro = rtrim(fgets(STDIN));
            echo "Rua: ";
            $nomeRua = rtrim(fgets(STDIN));
            array_push($this->listaEndereco, $nomeCidade, $nomeBairro, $nomeRua);
            echo PHP_EOL . "Endereço cadastrado!" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "3")
        {
            if(empty($this->listaEndereco))
            {
                echo PHP_EOL . "Nenhum endereço cadastrado." . PHP_EOL . PHP_EOL;
                $this->opcoesPerfil();
            }
            echo PHP_EOL . "[ 1 ] Visualizar endereço cadastrado\n[ 2 ] Alterar endereço\n[ 3 ] Excluir endereço\n[ 0 ] Cancelar\nEscolha uma opção: ";
            $escolhaGerenciarEndereco = rtrim(fgets(STDIN));
            if($escolhaGerenciarEndereco === "1")
            {
                $nomeCidade = $this->listaEndereco[0];
                $nomeBairro = $this->listaEndereco[1];
                $nomeRua = $this->listaEndereco[2];
                echo PHP_EOL . "Cidade: $nomeCidade\nBairro: $nomeBairro\nRua: $nomeRua" . PHP_EOL . PHP_EOL;
                $this->opcoesPerfil();
            }
            else if($escolhaGerenciarEndereco === "0")
            {
                echo PHP_EOL . "Ação cancelada!!" . PHP_EOL . PHP_EOL;
                $this->opcoesPerfil();
            }
        }

        else if ($escolhaPerfil === "4")
        {
            echo "Nome da comunidade: ";
            $novoNomeComunidade = rtrim(fgets(STDIN));
            echo "Descrição da Comunidade: ";
            $novaDescricao = rtrim(fgets(STDIN));

            $nomeCriador = $this->nomeUsuario;
            $novaComunidade = new Comunidade($nomeCriador, $novoNomeComunidade, $novaDescricao);
            $this->incrementaArrayComunidades($novaComunidade);

            echo PHP_EOL . "Comunidade ($novoNomeComunidade) criada" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "5")
        {
            echo PHP_EOL . "Email: $this->email\nNome de usuário: $this->nomeUsuario" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === '6')
        {
            if(empty($this->registrosComunidades))
            {
                echo PHP_EOL . "Você não possui nenhuma comunidade!" . PHP_EOL . PHP_EOL;
                $this->opcoesPerfil();
            }
            foreach($this->registrosComunidades as $comunidades)
            {
                if($comunidades->getNomeCriador() === $this->nomeUsuario)
                {
                    $nomeComunidade = $comunidades->getNomeComunidade();
                    $descricaoComunidade = $comunidades->getDescricaoComunidade();
                    $membrosComunidade = $comunidades->getMembrosComunidade();
                    echo PHP_EOL . "Nome da comunidade: $nomeComunidade\nDescrição da comunidade: $descricaoComunidade\nMembros: $membrosComunidade" . PHP_EOL . PHP_EOL;
                }
            }
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "7")
        {
            echo PHP_EOL . "Saindo da conta..." . PHP_EOL . PHP_EOL;
            new Menu();
        }

        else if ($escolhaPerfil === "0")
        {
            echo PHP_EOL . "Saindo do sistema..." . PHP_EOL;
            exit();
        }
        
        else 
        {
            echo PHP_EOL . "Opção inválida, por favor escolhaPerfil uma das opções disponíveis." . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }
    }

    public function incrementaArrayComunidades(Comunidade $novaComunidade): void
    {
        array_push($this->registrosComunidades, $novaComunidade);
    }
    //---------------------------------------------------------------------------------------------
}
