<?php

class MonCoyote_Entity_Societe
{

    protected $id;
    protected $nom;
    protected $adresse;

    /** @var MonCoyote_Entity_Contact[] */
    protected $contacts;

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function addContact(MonCoyote_Entity_Contact $contact)
    {
        $this->contacts[] = $contact;
        return $this;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

}
