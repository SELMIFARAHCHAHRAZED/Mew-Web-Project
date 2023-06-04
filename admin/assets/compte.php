<?php
	class compte 
	{
		
		private $idUser;
        private $email;
		private $name;
        private $lastname;
		private $occupation;
		private $gender;
        private $password;	
		public function __construct($email,$name,$lastname,$occupation,$gender,$password)
		{

			$this->email =$email;
			$this->name =$name;
			$this->lastname = $lastname;
			$this->occupation =$occupation;
            $this->gender = $gender;
            $this->password =$password;
		}
		 public function getIdUser () {
            return $this->idUser;
        }
        public function getpassword () {
            return $this->password;
        }

        public function getemail (){
            return $this->email ;
        }
         public function getname (){
            return $this->name ;
        }
        public function getgender (){
            return $this->gender ;
        }
        public function getlastname (){
            return $this->lastname ;
        }
        public function getoccupation (){
            return $this->occupation ;
        }
        public function setemail ($email){
            $this->email= $email;
        }

        public function setname ($name){
            $this->name = $name;
        }
        public function setgender ($gender){
            $this->gender= $gender;
        }

        public function setlastname ($lastname){
            $this->lastname = $lastname;
        }
        public function setoccupation ($occupation){
            $this->occupation= $occupation;
        }
        public function setpassword ($password){
            $this->password= $password;
        }

        
	}
?>