<?php
    class Cliente{
        //Propiedades
        public $idCliente; //Sólo ingreso en el constructor
        public $nombre;    //Sólo ingreso en el constructor
        public $apellido; //Sólo ingreso en el constructor
        public $genero;
        public $rol;
        public $username;
        public $telefono;
        public $preguntaS;
        public $respuestaS;
        public $contra;
        public $fechaNac; //Sólo ingreso en el constructor
        public $fechaIngreso; //Sólo ingreso en el constructor
        public $eMail; //Modificar
        //Método constructor
        //$c es un correlativo
        public function __construct($c,$v=0,$nom,$ape,$gen,$roles,$user,$tel,$pregS,$respS,$pass,$fn,$email){
            if(!empty($c) && is_numeric($c))
                $this->idCliente= date('Y') . $c. $v ;
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
                throw new Exception('Error. rol vacío');
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
                throw new Exception('Error. respuesta vacío');
            if(!empty($fn)){
                $fecha = explode('-',$fn);
               // if(checkdate($fecha[0],$fecha[1],$fecha[2]))       
                    $this->fechaNac = $fn;
                //else
                  //  throw new Exception('Error. Fecha invalida...!');
            }
            else
                throw new Exception('Error. Fecha vacía');
/*            if(!empty($email) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email))
                $this->eMail = $email;
            else
                throw new Exception('Error. email vacío');*/
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
    public function setIdCliente($id){
        $this->idCliente = $id;
    }
    //Getters
    public function getIdCliente(){
        return $this->idCliente;
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
    public function getRespuestaS(){
        return $this->respuestaS;
    }
    public function getrPreguntaS(){
        return $this->preguntaS;
    }
    public function getContra(){
        return $this->contra;
    }
    public function getFecNac(){
        return $this->fecNac;
    }
    public function getFechaIngreso(){
        return $this->fechaIngreso;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getNombreCompleto(){
        return $this->nombre . " " . $this->apellido;
    }
    public function getEdad(){
        $fecha = explode('/',$this->fechaNac);
        return date('Y') - $fecha[0];
    }
    public function toString(){
        return $this->idCliente.  " - " . $this->nombre . " " . $this->apellido;
    }
}//Fin clase
?>