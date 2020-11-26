<?php

include_once('ConexaoBD.php');
class ItemFinal {
    private $iditemfinal;
    private $noitemfinal;
    private $especifico;

    function getIditemfinal() {
        return $this->iditemfinal;
    }

    function getNoitemfinal() {
        return $this->noitemfinal;
    }

    function getEspecifico() {
        return $this->especifico;
    }

    function setIditemfinal($iditemfinal) {
        $this->iditemfinal = $iditemfinal;
    }

    function setNoitemfinal($noitemfinal) {
        $this->noitemfinal = $noitemfinal;
    }

    function setEspecifico($especifico) {
        $this->especifico = $especifico;
    }

    function __construct($iditemfinal = null, $noitemfinal = null, $especifico = null) {
        $this->iditemfinal = $iditemfinal;
        $this->noitemfinal = $noitemfinal;
        $this->especifico = $especifico;
    }

    

   

    public function lista(){
        try {
            $sql  = "SELECT C.iditemfinal AS ' IdItemFinal', C.noitemfinal AS 'NoItemFinal', F.noespecifico AS 'Especifico'
FROM tbitemfinal AS C
INNER JOIN tbespecifico AS F ON C.idespecifico = F.idespecifico";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $itemfinal = new ItemFinal();
                $itemfinal->setIditemfinal($row->IdItemFinal);
                $itemfinal->setNoitemfinal($row->NoItemFinal);
                $itemfinal->setEspecifico($row->Especifico);
                $res[] = $itemfinal;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idespecifico){
        try {
            $sql  = "SELECT C.idespecifico, C.noespecifico, F.nosubmodulo AS 'Submodulo' 
FROM tbespecifico AS C
INNER JOIN tbsubmodulo AS F ON C.idsubmodulo = F.idsubmodulo WHERE idespecifico = ".$idespecifico." ORDER BY noespecifico";
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
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($noespecifico,$submodulo, $codigo){
        try {
            $sql = "UPDATE Tbespecifico
                       SET NoEspecifico = ?,
                       SET IdSubmodulo = ?
                       
                     WHERE Idespecifico = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $noespecifico);
            $stm->bindParam(2, $idsubmodulo);
            $stm->bindParam(3, $codigo);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($noitemfinal, $idespecifico){
      try {
        $sql = "INSERT INTO TbItemFinal(noitemfinal,idespecifico)
                VALUES (?,?);";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $noitemfinal);
        $stm->bindParam(2, $idespecifico);
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