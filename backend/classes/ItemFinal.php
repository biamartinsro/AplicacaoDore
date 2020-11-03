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
            $sql  = "SELECT C.iditemfinal, C.noitemfinal, F.noItemFinal AS 'Específico'
FROM tbitemfinal AS C
INNER JOIN tbItemFinal AS F ON C.idItemFinal = F.idItemFinal";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $itemfinal = new ItemFinal();               
                $ItemFinal->setIdItemFinal($row->IdItemFinal);
                $ItemFinal->setNoItemFinal($row->NoItemFinal);
                $ItemFinal->setSubmodulo($row->Especifico);
                $res[] = $ItemFinal;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idItemFinal){
        try {
            $sql  = "SELECT C.iditemfinal, C.noitemfinal, F.noespecifico AS 'Específico'
FROM tbitemfinal AS C
INNER JOIN tbespecifico AS F ON C.idespecifico = F.idespecifico WHERE idItemFinal = ".$idItemFinal." ORDER BY noItemFinal";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
               $ItemFinal = new ItemFinal();               
                $ItemFinal->setIdItemFinal($row->IdItemFinal);
                $ItemFinal->setNoItemFinal($row->NoItemFinal);
                $ItemFinal->setSubmodulo($row->Especifico);
                $res[] = $ItemFinal;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($noItemFinal,$especifico, $codigo){
        try {
            $sql = "UPDATE TbItemFinal
                       SET NoItemFinal = ?,
                       SET IdEspecifico = ?
                       
                     WHERE IdItemFinal = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $noItemFinal);
            $stm->bindParam(2, $idespecifico);
            $stm->bindParam(3, $codigo);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($noItemFinal, $idsubmodulo){
      try {
        $sql = "INSERT INTO TbItemFinal(noItemFinal,idespecifico)
                VALUES (?,?);";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $noItemFinal);
        $stm->bindParam(2, $especifico);
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM TbItemFinal WHERE IdItemFinal = ?"; 
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