<?php

include_once('ConexaoBD.php');
class Motivo {
    private $idmotivo;
    private $descricao;

    function getIdmotivo() {
        return $this->idmotivo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setIdmotivo($idmotivo) {
        $this->idmotivo = $idmotivo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function __construct($idmotivo = null, $descricao = null) {
        $this->idmotivo = $idmotivo;
        $this->descricao = $descricao;
    }


    

   

    public function lista(){
        try {
            $sql  = "SELECT IdMotivo,Descricao FROM `tbmotivo` ORDER BY descricao";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $motivo = new Motivo();               
                $motivo->setIdmotivo($row->IdMotivo);
                $motivo->setDescricao($row->Descricao);
                $res[] = $motivo;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idmotivo){
        try {
            $sql  = "SELECT IdMotivo, Descricao FROM tbmotivo WHERE idmotivo = ".$idmotivo." ORDER BY descricao";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
               $motivo = new Motivo();
               $motivo->setIdmotivo($row->IdMotivo);
               $motivo->setDescricao($row->Descricao);
                $res[] = $motivo;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($descricao, $codigo){
        try {
            $sql = "UPDATE Tbmotivo
                       SET Descricao = ? 
                     WHERE Idmotivo = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $descricao);
            $stm->bindParam(2, $codigo);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($descricao){
      try {
        $sql = "INSERT INTO Tbmotivo(descricao)
                VALUES (?);";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $descricao);
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM Tbmotivo WHERE Idmotivo = ?"; 
	      $conn = ConexaoBD::conecta();
                                       
	      $stm = $conn->prepare($sql);
	      $stm->bindParam(1, $codigo);
	      $stm->execute();
              return 1; 
	    } catch (Exception $e) {
              return 0; 
      } //try-catch     
    } //método exclui

}