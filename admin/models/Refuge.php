<?php


class Refuge
{
    private $id;
    private $nom;
    private $capacite;
    private $nbr_benevoles;
    private $adresse;
    private $photo;


    public function __construct($nom, $capacite, $nbr_benevoles, $adresse, $photo)
    {
        $this->nom = $nom;
        $this->capacite = $capacite;
        $this->nbr_benevoles = $nbr_benevoles;
        $this->adresse = $adresse;
        $this->photo = $photo;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getcapacite()
    {
        return $this->capacite;
    }

    /**
     * @param mixed $capacite
     */
    public function setcapacite($capacite)
    {
        $this->capacite = $capacite;
    }

    /**
     * @return mixed
     */
    public function getnbrbenevoles()
    {
        return $this->nbr_benevoles;
    }

    /**
     * @param mixed $nbr_benevoles
     */
    public function setnbrbenevoles($nbr_benevoles)
    {
        $this->nbr_benevoles = $nbr_benevoles;
    }

    /**
     * @return mixed
     */
    public function getadresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setadresse($adresse)
    {
        $this->adresse = $adresse;
    }


    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    

    


}