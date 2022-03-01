<?php

class Controller{

    public $path="/boutique_en_ligne/";

    public function __construct()
    {
    }

    public function loadModel(string $model)

    {
        $this->$model = new $model();
    }
    public static function render($fichier, $data = [])
    {
        extract($data);
        ob_start();
        require_once (ROOT.'view/'.$fichier.'.php');
        $content=ob_clean();
        require_once (ROOT.'view/layout.html.php');
    }
}