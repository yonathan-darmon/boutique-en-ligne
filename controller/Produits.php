<?php

class Produits extends Controller
{
    public function index()
    {
        $this->loadModel("produitsmodel");
        $produits = $this->produitsmodel->getAll();
        $this->render('produits', compact('produits'));

    }
}
