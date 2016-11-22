<?php

class MonCoyote_Entity_Contact
{

    protected $prenom;
    protected $nom;

    /** @var MonCoyote_Entity_Societe */
    protected $societe;

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

    public function getSociete()
    {
        return $this->societe;
    }

    public function setSociete(FileLogger $societe)
    {
        $this->societe = $societe;
        return $this;
    }

}
