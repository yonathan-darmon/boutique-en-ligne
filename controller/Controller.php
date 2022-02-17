<?php

class Controller
{
    public function loadModel(string $model)

    {
        $this->$model = new $model();
    }
    public static function render($fichier, $data = [])
    {
        extract($data);
        require_once (ROOT.'view/'.$fichier.'.php');
    }
}