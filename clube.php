<?php

    class Clube {

            var $nome_clube;
            var $escudo;
            var $desafiado;
            var $h;
            var $lista_jogadores = array();

            function Clube($nome_clube, $escudo, $desafiado){

                $this->h = 1000;
                $this->nome_clube = $nome_clube;
                $this->escudo = $escudo;
                $this->desafiado = $desafiado;

            }

            public function getNome() {

                return $this->nome_clube;
            }

            public function getEscudo() {

                return $this->escudo;
            }

            public function setdesafiado($desafiado) {

                $this->desafiado = $desafiado;
            }

            public function getdDsafiado() {

                return $this->desafiado;
            }

            public function setJogador(array $lista_jogadores) {

                $this->lista_jogadores = $lista_jogadores;
            }

            public function getJogador($i) {

                return $this->lista_jogadores[$i];
            }

            public function gastarHaironletas($h){

                $this->h = $this->h - $h;
            }

            public function getHaironletas($h){

                $this->h = $this->h - $h;
            }

            public function setHaironletas($h){

                $this->h = $this->h + $h;
            }
            public function showHaironletas(){

                return $this->h;
            }

        }
?>