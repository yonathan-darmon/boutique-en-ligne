<?php

class Controller
{
    public function loadModel(string $model)

    {
        require_once (ROOT.'model/'.$model.'.php');
        $this->$model = new $model();
    }
    public function render($fichier, $data = [])
    {
        extract($data);
        require_once (ROOT.'view/'.$fichier.'.php');
    }
}