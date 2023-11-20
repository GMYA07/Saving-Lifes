<?php
    class Cliente{
        //Propiedades
        public $codigoUsu;
        public $nombre;
        public $apellido;
        public $genero;
        public $rol;
        public $username;
        public $telefono;
        public $preguntaS;
        public $respuestaS;
        public $contra;
        public $codEspe;
        public $fechaIngreso;
        public $fechaNac;
        public $eMail;
        public function __construct($c,$v=1,$nom,$ape,$gen,$roles,$user,$tel,$pregS,$respS,$pass,$espe,$fn,$email){

            
            if(!empty($c) && is_numeric($c))
                $this->codigoUsu= date('Y') . $c. $v ;
            else
                throw new Exception('Error. Correlativo incorrecto');
            if(!empty($nom))
                $this->nombre = $nom;
            else
                throw new Exception('Error. Nombre incorrecto');
            if(!empty($ape))
                $this->apellido = $ape;
            else
                throw new Exception('Error. Apellido vacío');
            if(!empty($gen))
                $this->genero = $gen;
            else
                throw new Exception('Error. genero vacío');
            if(!empty($roles))
                $this->rol = $roles;
            else
                throw new Exception('Error. rol vacío');
            if(!empty($user))
                $this->username = $user;
            else
                throw new Exception('Error. Nombre de usuario vacío');
            if(!empty($tel))
                $this->telefono = $tel;
            else
                throw new Exception('Error. telefono vacío');
            if(!empty($pregS))
                $this->preguntaS = $pregS;
            else
                throw new Exception('Error. pregunta vacío');
            if(!empty($respS))
                $this->respuestaS = $respS;
            else
                throw new Exception('Error. respuesta vacío');
            if(!empty($pass))
                $this->contra = $pass;
            else
                throw new Exception('Error. contraseña incorrecto');
            if(!empty($espe))
                $this->codEspe = $espe;
            else
                throw new Exception('Error. codigoEspecial incorrecto');
            if(!empty($fn)){
                $fecha = explode('-',$fn);      
                    $this->fechaNac = $fn;
            }
            else
                throw new Exception('Error. Fecha vacía');
            $this->valEmail($email);
            $this->fechaIngreso = date('Y/m/d');
        }
        
        private function valEmail($email){
            if(!empty($email) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email))
                $this->eMail = $email;
            else
                throw new Exception('Error. email vacío');
        }
    
    //Setters
    public function setEmail($email){
        $this->valEmail($email);
    }
    public function setCodigoUsu($id){
        $this->codigoUsu = $id;
    }

    //getters
    public function getCodigoUsu(){
        return $this->codigoUsu;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function getRol(){
        return $this->rol;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getPreguntaS(){
        return $this->preguntaS;
    }
    public function getRespuestaS(){
        return $this->respuestaS;
    }
    public function getContra(){
        return $this->contra;
    }
    public function getCodEspe(){
        return $this->codEspe;
    }
    public function getFechaNac(){
        return $this->fechaNac;
    }
    public function getFechaIngreso(){
        return $this->fechaIngreso;
    }
    public function getEmail(){
        return $this->eMail;
    }
    public function getEdad(){
        $fecha = explode('/',$this->fechaNac);
        return date('Y') - $fecha[0];
    }
    public function toString(){
        return $this->codigoUsu.  " - " . $this->nombre . " " . $this->apellido;
    }
}   

//Fin clase
?>