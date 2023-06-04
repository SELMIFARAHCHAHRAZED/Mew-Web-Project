<?php 

require_once '../config.php';
    class reclamationR {
        public function afficherreclamation() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reclamation'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getRecByiduser($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reclamation WHERE iduser = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
        public function getRecByidRec($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reclamation WHERE idRec = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
public function getRecBysujet($sujett) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reclamation WHERE sujet = :sujett'
                );
                $query->execute([
                    'sujett' => $sujett
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getRecBymessage($messages) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reclamation WHERE message = :messages'
                );
                $query->execute([
                    'messages' => $messages
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getRecByfile($files) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reclamation WHERE file = :files'
                );
                $query->execute([
                    'files' => $files
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addRec($reclamation) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO reclamation (idRec, iduser,sujet, message, file) 
                VALUES (:idRec, :iduser,:sujet, :message, :file)'
                );
                $query->execute([
                    'idRec' => $reclamation->getidRec(),
                    'iduser' => $reclamation->getiduser(),
                    
                    'sujet' => $reclamation->getsujet(),
                    'message' => $reclamation->getmessage(),
                    'file' => $reclamation->getfile()
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteRec($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM reclamation WHERE idRec = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        
    }

 ?>