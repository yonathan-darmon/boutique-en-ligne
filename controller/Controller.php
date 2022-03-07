<?php

class Controller
{

    public $path = "/boutique_en_ligne/";

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
        require_once(ROOT . 'view/' . $fichier . '.php');
        $content = ob_get_clean();
        require_once(ROOT . 'view/layout.html.php');
    }

    public function disconnect($id)
    {
        if (isset($_POST['deco'])){
            $panier=new PanierModel();
            $panier->delete($_SESSION['id']);
            unset($_SESSION['id']);
            header('location:'.path.'accueil');
        }
    }
}