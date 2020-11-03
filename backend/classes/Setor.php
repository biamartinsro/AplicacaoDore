<?php

include_once('ConexaoBD.php');
class Setor {
    private $idsetor;
    private $nosetor;

    function getIdsetor() {
        return $this->idsetor;
    }

    function getNosetor() {
        return $this->nosetor;
    }

    function setIdsetor($idsetor) {
        $this->idsetor = $idsetor;
    }

    function setNosetor($nosetor) {
        $this->nosetor = $nosetor;
    }

    function __construct($idsetor = null, $nosetor = null) {
        $this->idsetor = $idsetor;
        $this->nosetor = $nosetor;
    }


    
    

   

    public function lista(){
        try {
            $sql  = "SELECT idsetor,nosetor FROM `tbsetor` ORDER BY nosetor";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $setor = new setor();               
                $setor->setIdsetor($row->idsetor);
                $setor->setNosetor($row->nosetor);
                $res[] = $setor;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idsetor){
        try {
            $sql  = "SELECT idsetor,nosetor FROM tbsetor WHERE idsetor = ".$idsetor." ORDER BY nosetor";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $setor = new setor();                
                $setor->setIdsetor($row->idsetor);
                $setor->setNosetor($row->nosetor);
                
                $res[] = $setor;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE Tbsetor
                       SET Nosetor = ? 
                     WHERE Idsetor = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $codigo);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($nome){
      try {
        $sql = "INSERT INTO Tbsetor(nosetor)
                VALUES (?);";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $nome);
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM Tbsetor WHERE Idsetor = ?"; 
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