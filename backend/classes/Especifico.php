<?php

include_once('ConexaoBD.php');
class Especifico {
    private $idespecifico;
    private $noespecifico;
    private $submodulo;

    function getIdespecifico() {
        return $this->idespecifico;
    }

    function getNoespecifico() {
        return $this->noespecifico;
    }

    function getSubmodulo() {
        return $this->submodulo;
    }

    function setIdespecifico($idespecifico) {
        $this->idespecifico = $idespecifico;
    }

    function setNoespecifico($noespecifico) {
        $this->noespecifico = $noespecifico;
    }

    function setSubmodulo($submodulo) {
        $this->submodulo = $submodulo;
    }

    function __construct($idespecifico = null, $noespecifico = null, $submodulo = null) {
        $this->idespecifico = $idespecifico;
        $this->noespecifico = $noespecifico;
        $this->submodulo = $submodulo;
    }

    

   

    public function lista(){
        try {
            $sql  = "SELECT C.idespecifico AS 'IdEspecifico', C.noespecifico AS 'NoEspecifico', F.nosubmodulo AS 'Submodulo' 
FROM tbespecifico AS C
INNER JOIN tbsubmodulo AS F ON C.idsubmodulo = F.idsubmodulo";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $especifico = new Especifico();               
                $especifico->setIdespecifico($row->IdEspecifico);
                $especifico->setNoespecifico($row->NoEspecifico);
                $especifico->setSubmodulo($row->Submodulo);
                $res[] = $especifico;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }


    public function consulta($idespecifico){
        try {
            $sql  = "SELECT idespecifico, noespecifico FROM tbespecifico WHERE idespecifico = ".$idespecifico." ORDER BY Noespecifico";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $especifico = new Especifico();
                $especifico->setIdespecifico($row->idespecifico);
                $especifico->setNoespecifico($row->noespecifico);

                $res[] = $especifico;
            }
            return $res;
        } catch (Exception $e) {
            return "ERRO: ".$e->getMessage()."<br><br>";
        }
    }
    
   
    
    public function altera($noespecifico,$submodulo, $codigo){
        try {
            $sql = "UPDATE TbEspecifico
                       SET NoEspecifico = ?,
                            IdSubmodulo = ?
                       
                     WHERE IdEspecifico = ?";
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $noespecifico);
            $stm->bindParam(2, $submodulo);
            $stm->bindParam(3, $codigo);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($noespecifico, $idsubmodulo){
      try {
        $sql = "INSERT INTO Tbespecifico(noespecifico,idsubmodulo)
                VALUES (?,?);";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $noespecifico);
        $stm->bindParam(2, $idsubmodulo);
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM Tbespecifico WHERE Idespecifico = ?"; 
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