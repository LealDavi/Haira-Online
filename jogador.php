<?php

    class Jogador {
    
        var $nome;
        var $foto;
        var $habilidade;
        var $raca;
        var $capacidade_fisica;
        var $nome_clube;

        function Jogador($nome, $foto, $habilidade, $raca, $capacidade_fisica, $nome_clube){

            $this->nome = $nome;
            $this->foto = $foto;
            $this->habilidade = $habilidade;
            $this->raca = $raca;
            $this->capacidade_fisica = $capacidade_fisica;
            $this->nome_clube = $nome_clube;

        }

        public function getNome(){

            return $this->nome;
        }

        public function getFoto(){

            return $this->foto;
        }

        public function getHabilidade(){

            return $this->habilidade;
        }

        public function getRaca(){

            return $this->raca;
        }

        public function getCapacidade_fisica(){

            return $this->capacidade_fisica;
        }

        public function getNome_clube(){

            return $this->nome_clube;
        }
    }
?>