<?php

class Contact
{

    protected $prenom;
    protected $nom;

    public function __construct($prenom, $nom)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function hello()
    {
        return 'Bonjour';
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

}
