<?php

require("DataBaseModel.php");

class RefugeController extends DataBaseModel
{


    public function ajouterRefuge($refuge)
    {

        $sql = "INSERT into refuge (nom,capacite,nbr_benevoles,adresse,photo) values (:nom,:capacite,:nbr_benevoles,:adresse,:photo)";
        $db = $this->getConnexion();

        $req = $db->prepare($sql);
        $req->bindValue(':nom', $refuge->getNom());
        $req->bindValue(':capacite', $refuge->getcapacite());
        $req->bindValue(':nbr_benevoles', $refuge->getnbrbenevoles());
        $req->bindValue(':adresse', $refuge->getadresse());
        $req->bindValue(':photo', $refuge->getPhoto());

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function modifierRefuge($refuge)
    {
        $sql = "UPDATE refuge SET  nom=:nom , capacite=:capacite ,nbr_benevoles=:nbr_benevoles ,adresse=:adresse  ,photo=:photo   WHERE id= :id";

        $db = $this->getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':nom', $refuge->getNom());
        $req->bindValue(':capacite', $refuge->getcapacite());
        $req->bindValue(':nbr_benevoles', $refuge->getnbrbenevoles());
        $req->bindValue(':adresse', $refuge->getadresse());
        $req->bindValue(':photo', $refuge-> getPhoto());
        $req->bindValue(':id', $refuge->getId());
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function modifierRefugeNoPhoto($refuge)
    {
        $sql = "UPDATE refuge SET  nom=:nom , capacite=:capacite ,nbr_benevoles=:nbr_benevoles ,adresse=:adresse WHERE id= :id";

        $db = $this->getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':nom', $refuge->getNom());
        $req->bindValue(':capacite', $refuge->getcapacite());
        $req->bindValue(':nbr_benevoles', $refuge->getnbrbenevoles());
        $req->bindValue(':adresse', $refuge->getadresse());
        $req->bindValue(':id', $refuge->getId());
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function supprimerRefuge($id)
    {

        $sql = "DELETE FROM refuge where id=:id";
        $db = $this->getConnexion();

        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }


    public function afficherRefuge()
    {
        $sql = "SELECT * from refuge ";
        $db = $this->getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
            return $req->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



}