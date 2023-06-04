<?php
	class reclamation 
	{
		
		private $idRec;
        private $iduser;
		
        private $sujet;
		private $message;
		private $file;
        
		public function __construct($iduser,$sujet,$message,$file)
		{

			
			$this->iduser =$iduser;
			
			$this->sujet =$sujet;
            $this->message = $message;
            $this->file =$file;
		}
		 public function getidRec () {
            return $this->idRec;
        }
        public function getiduser () {
            return $this->iduser;
        }

      
         
        public function getsujet (){
            return $this->sujet ;
        }
        public function getmessage (){
            return $this->message ;
        }
        public function getfile (){
            return $this->file ;
        }
        public function setidRec ($idRec){
            $this->idRec= $idRec;
        }

        public function setiduser ($iduser){
            $this->iduser = $iduser;
        }

        public function setsujet ($sujet){
            $this->sujet = $sujet;
        }
        public function setmessage ($message){
            $this->message= $message;
        }
        public function setfile ($file){
            $this->file= $file;
        }

        
	}
?>