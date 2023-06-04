<?php 

require_once '../config.php';
    class compteU {
        public function afficheruser() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getUserById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user WHERE idUser = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getUserByEmail($email) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user WHERE email = :email'
                );
                $query->execute([
                    'email' => $email
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getUserByGender($gender) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user WHERE gender = :gender'
                );
                $query->execute([
                    'gender' => $gender
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
public function getUserByOccupation($occupation) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user WHERE occupation = :occupation'
                );
                $query->execute([
                    'occupation' => $occupation
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getUserByLastname($lastname) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user WHERE lastname = :lastname'
                );
                $query->execute([
                    'lastname' => $lastname
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getUserByName($name) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user WHERE name = :name'
                );
                $query->execute([
                    'name' => $name
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addUser($compte) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO user (email, name, lastname, occupation, gender, password) 
                VALUES (:email, :name, :lastname, :occupation, :gender, :password)'
                );
                $query->execute([
                    'email' => $compte->getemail(),
                    'name' => $compte->getname(),
                    'lastname' => $compte->getlastname(),
                    'occupation' => $compte->getoccupation(),
                    'gender' => $compte->getgender(),
                    'password' => $compte->getpassword()
                    
                    
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateUser($compte, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE user SET email = :email, name = :name, lastname = :lastname, occupation = :occupation , gender = :gender , password = :password WHERE idUser = :id'
                );
                $query->execute([
                    'email' => $compte->getemail(),
                    'name' => $compte->getname(),
                    'lastname' => $compte->getlastname(),
                    'occupation' => $compte->getoccupation(),
                    'gender' => $compte->getgender(),
                    'password' => $compte->getpassword(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteUser($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM user WHERE idUser = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherUser($name) {            
            $sql = "SELECT * from user where name=:name"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'name' => $user->getname(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        function connexionUser($email,$password){
            $sql="SELECT * FROM user WHERE email='" . $email . "' and password = '". $password."'";
            $db = getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0) {
                    $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                    $message = $x['role'];
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }
    }

 ?>