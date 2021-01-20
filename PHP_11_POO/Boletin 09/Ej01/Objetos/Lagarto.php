<?php

include_once 'Animal.php';

class Lagarto extends Animal {

    public function tomaElSol() {
        return "Que calorzito";
    }

    public function escondete() {
        return "Hago zas y desaparezco";
    }
}