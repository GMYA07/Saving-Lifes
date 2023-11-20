<?php
require_once 'claseConexion.php';
class DaoVeterinario{
    public function insertar($cliente){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "INSERT INTO usuarioespe (codigoUsu, nombre, apellido, genero, rol, username, telefono, preguntaS, respuestaS, contra, codEspe, fechaNac, fechaIngreso, eMail )";
        $sql .= " VALUES (:codigoUsu, :nombre, :apellido, :genero, :rol, :username, :telefono, :preguntaS,:respuestaS, :contra, :codEspe,:fechaNac,:fechaIngreso, :eMail   )";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->execute((array) $cliente);
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }  
    public function modificar($cliente){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "UPDATE usuarioespe SET nombre=:nombre, apellido=:apellido, username=:username,  email=:email,telefono=:telefono, contra=:contra WHERE codigoUsu=:codigoUsu";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':codigoUsu',$cliente->codigoUsu);
            $stmt->bindParam(':nombre',$cliente->nombre);
            $stmt->bindParam(':apellido',$cliente->apellido);
            $stmt->bindParam(':username',$cliente->username);
            $stmt->bindParam(':email',$cliente->eMail);
            $stmt->bindParam(':telefono',$cliente->telefono);
            $stmt->bindParam(':contra',$cliente->contra);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 
    public function eliminar($id){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "DELETE FROM usuarioespe WHERE codigoUsu=:codigoUsu";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':codigoUsu',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 
    public function getCorrelativo($year){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "SELECT count(*) as correlativo FROM usuarioespe WHERE codigoUsu like '$year%'";
        $stmt=$dbh->prepare($sql);
//        $stmt->bindParam(':year', $year);
        $stmt->execute();
        $row = $stmt->fetch();
        if(isset($row[0]))
            return $row[0]+1;
        else
            return 1;
    }  
    public function listadoClientes(){
        $sql = "select codigoUsu, nombre, apellido, rol from usuarioespe order by codigoUsu, apellido, rol";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    }
 
    public function mostrarCliente($id){
        $sql = "select * from usuarioespe where codigoUsu=:id";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $cliente = $stmt->fetch();
        return $cliente;
    }
}
?>





