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
    
    public function consulta($iditemfinal){
        try {
            $sql  = "SELECT C.iditemfinal as 'IdItemFinal', C.noitemfinal as 'NoItemFinal', F.noespecifico AS 'Especifico' 
FROM tbitemfinal AS C
INNER JOIN tbespecifico AS F ON C.idespecifico = F.idespecifico WHERE iditemfinal = ".$iditemfinal." ORDER BY noitemfinal";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $itemfinal = new ItemFinal();
                $itemfinal->setIdItemFinal($row->IdItemFinal);
                $itemfinal->setNoItemFinal($row->NoItemFinal);
                $itemfinal->setEspecifico($row->Especifico);
                $res[] = $itemfinal;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($noitemfinal,$especifico, $codigo){
        try {
            $sql = "UPDATE tbitemfinal SET noitemfinal=?,idespecifico=?
where iditemfinal = ?";
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $noitemfinal);
            $stm->bindParam(2, $especifico);
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
	      $sql = "DELETE FROM tbitemfinal WHERE iditemfinal = ?";
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