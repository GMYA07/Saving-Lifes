<?php
require_once 'claseConexion.php';
class DaoCliente{
    public function insertar($cliente){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "INSERT INTO usuarios (idCliente, nombre, apellido, genero, rol, username, telefono, preguntaS, respuestaS, contra, fechaNac, ";
        $sql .= "fechaIngreso, eMail) ";
        $sql .= " VALUES (:idCliente, :nombre, :apellido, :genero, :rol, :username, :telefono, :preguntaS, :respuestaS, :contra, :fechaNac, :fechaIngreso, ";
        $sql .= ":eMail)";
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
        $sql = "UPDATE usuarios SET nombre=:nombre, apellido=:apellido, username=:username,  email=:email,telefono=:telefono, contra=:contra WHERE idCliente=:idCliente";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':idCliente',$cliente->idCliente);
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
        $sql = "DELETE FROM usuarios WHERE idCliente=:idCliente";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':idCliente',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 
    public function eliminar2($id){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "DELETE FROM daradop WHERE idDarAdop=:idDarAdop";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':idDarAdop',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 

    public function eliminar3($id){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "DELETE FROM foro WHERE ID=:ID";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':ID',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 
    public function eliminar4($id){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "DELETE FROM forov WHERE ID=:ID";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':ID',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 
    public function eliminar5($id){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "DELETE FROM foror WHERE ID=:ID";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':ID',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    } 

    public function getCorrelativo($year){
        $cn = new Conexion();        
        $dbh = $cn->getConexion();
        $sql = "SELECT count(*) as correlativo FROM usuarios WHERE idcliente like '$year%'";
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
        $sql = "select idCliente, nombre, apellido, rol from usuarios order by idCliente, apellido, rol";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    }
    
    public function mostrarCliente($id){
        $sql = "select * from usuarios where idCliente=:id";
        $cn = new Conexion();
        $dbh = $cn->getConexion();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $cliente = $stmt->fetch();
        return $cliente;


    }

    public function mostrarCliente2($id){
        $sql = "select * from reportar where codigoReport=:id";
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





