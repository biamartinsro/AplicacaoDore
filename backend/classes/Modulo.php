<?php

include_once('ConexaoBD.php');
class modulo {
    private $idmodulo;
    private $nomodulo;

    function getIdmodulo() {
        return $this->idmodulo;
    }

    function getNomodulo() {
        return $this->nomodulo;
    }

    function setIdmodulo($idmodulo) {
        $this->idmodulo = $idmodulo;
    }

    function setNomodulo($nomodulo) {
        $this->nomodulo = $nomodulo;
    }

    function __construct($idmodulo = null, $nomodulo = null) {
        $this->idmodulo = $idmodulo;
        $this->nomodulo = $nomodulo;
    }


    
    

   

    public function lista(){
        try {
            $sql  = "SELECT idmodulo,nomodulo FROM `tbmodulo` ORDER BY nomodulo";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $modulo = new modulo();               
                $modulo->setIdmodulo($row->idmodulo);
                $modulo->setNomodulo($row->nomodulo);
                $res[] = $modulo;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idmodulo){
        try {
            $sql  = "SELECT idmodulo, nomodulo FROM tbmodulo WHERE idmodulo = ".$idmodulo." ORDER BY Nomodulo";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $modulo = new modulo();                
                $modulo->setIdmodulo($row->idmodulo);
                $modulo->setNomodulo($row->nomodulo);
                
                $res[] = $modulo;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE Tbmodulo
                       SET Nomodulo = ? 
                     WHERE Idmodulo = ?"; 
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
        $sql = "INSERT INTO Tbmodulo(nomodulo)
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
	      $sql = "DELETE FROM Tbmodulo WHERE Idmodulo = ?"; 
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