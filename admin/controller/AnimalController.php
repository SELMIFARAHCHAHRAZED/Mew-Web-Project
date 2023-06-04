<?php


class AnimalController extends DataBaseModel
{


    public function ajouterAnimal($animal)
    {

        $sql = "INSERT into animal (nom,age,sexe,race,refugeId,poids,photo,description) values (:nom,:age,:sexe,:race,:refugeId,:poids,:photo,:description)";
        $db = $this->getConnexion();

        $req = $db->prepare($sql);
        $req->bindValue(':nom', $animal->getNom());
        $req->bindValue(':age', $animal->getAge());
        $req->bindValue(':sexe', $animal->getSexe());
        $req->bindValue(':race', $animal->getRace());
        $req->bindValue(':refugeId', $animal->getRefugeId());
        $req->bindValue(':poids', $animal->getPoids());
        $req->bindValue(':photo', $animal->getPhoto());
        $req->bindValue(':description', $animal->getDescription());

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function modifierAnimal($animal)
    {
        $sql = "UPDATE animal SET  nom=:nom , age=:age ,sexe=:sexe ,race=:race ,refugeId=:refugeId ,poids=:poids ,photo=:photo ,description=:description  WHERE id= :id";

        $db = $this->getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':nom', $animal->getNom());
        $req->bindValue(':age', $animal->getAge());
        $req->bindValue(':sexe', $animal->getSexe());
        $req->bindValue(':race', $animal->getRace());
        $req->bindValue(':refugeId', $animal->getRefugeId());
        $req->bindValue(':poids', $animal->getPoids());
        $req->bindValue(':photo', $animal->getPhoto());
        $req->bindValue(':description', $animal->getDescription());
        $req->bindValue(':id', $animal->getId());
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function modifierAnimalNoPhoto($animal)
    {
        $sql = "UPDATE animal SET  nom=:nom , age=:age ,sexe=:sexe ,race=:race ,refugeId=:refugeId ,poids=:poids ,description=:description  WHERE id= :id";

        $db = $this->getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':nom', $animal->getNom());
        $req->bindValue(':age', $animal->getAge());
        $req->bindValue(':sexe', $animal->getSexe());
        $req->bindValue(':race', $animal->getRace());
        $req->bindValue(':refugeId', $animal->getRefugeId());
        $req->bindValue(':poids', $animal->getPoids());
        $req->bindValue(':description', $animal->getDescription());
        $req->bindValue(':id', $animal->getId());
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function supprimerAnimal($id)
    {

        $sql = "DELETE FROM animal where id=:id";
        $db = $this->getConnexion();

        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }


    public function afficherAnimal()
    {
        $sql = "SELECT animal.id as id, animal.nom as nom, animal.age as age , animal.sexe as sexe , animal.race as race , animal.refugeId as refugeId , animal.poids as poids , animal.photo as photo , animal.description as description , refuge.nom as refugeNom from animal inner join refuge on animal.refugeId=refuge.id";
        $db = $this->getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
            return $req->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getStatisticRefuge()
    {
        $sql = "select refuge.nom as nom , count(*) as nbr from animal inner join refuge on refuge.id = animal.refugeId GROUP BY animal.refugeId";
        $db = $this->getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
            return $req->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function getStatisticRace()
    {
        $sql = "select animal.race as nom , count(race) as nbr from animal   GROUP BY animal.race";
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