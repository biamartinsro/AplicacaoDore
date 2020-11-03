<?php

include_once('ConexaoBD.php');
class Problema {
    private $idproblema;
    private $descricao;
    private $submodulo;
    private $especifico;
    private $itemfinal;
    

    function getIdproblema() {
        return $this->idproblema;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getSubmodulo() {
        return $this->submodulo;
    }

    function getEspecifico() {
        return $this->especifico;
    }

    function getItemfinal() {
        return $this->itemfinal;
    }

    function setIdproblema($idproblema) {
        $this->idproblema = $idproblema;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setSubmodulo($submodulo) {
        $this->submodulo = $submodulo;
    }

    function setEspecifico($especifico) {
        $this->especifico = $especifico;
    }

    function setItemfinal($itemfinal) {
        $this->itemfinal = $itemfinal;
    }

    function __construct($idproblema = null, $descricao = null, $submodulo = null, $especifico = null, $itemfinal = null) {
        $this->idproblema = $idproblema;
        $this->descricao = $descricao;
        $this->submodulo = $submodulo;
        $this->especifico = $especifico;
        $this->itemfinal = $itemfinal;
    }

    

    public function lista(){
        try {
            $sql  = "SELECT C.idproblema, C.descricao, F.nosubmodulo, G.noespecifico, H.noitemfinal
FROM tbproblema AS C
INNER JOIN tbsubmodulo AS F ON C.idsubmodulo = F.idsubmodulo
INNER JOIN tbespecifico AS G ON C.idespecifico = G.idespecifico
INNER JOIN tbitemfinal AS H ON C.iditemfinal = H.iditemfinal";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
               $Problema = new Problema();
               $Problema->setIdproblema($row->IdProblema);
               $Problema->setDescricao($row->Descricao);
               $Problema->setEspecifico($row->Especifico);
               $Problema->setItemfinal($row->ItemFinal);
               $Problema->setSubmodulo($row->Submodulo);
                $res[] = $Problema;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idproblema){
        try {
            $sql  = "SELECT C.idproblema, C.descricao, F.nosubmodulo, G.noespecifico, H.noitemfinal
FROM tbproblema AS C
INNER JOIN tbsubmodulo AS F ON C.idsubmodulo = F.idsubmodulo
INNER JOIN tbespecifico AS G ON C.idespecifico = G.idespecifico
INNER JOIN tbitemfinal AS H ON C.iditemfinal = H.iditemfinal WHERE idProblema = ".$idProblema." ORDER BY Descricao";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
              $Problema = new Problema();
               $Problema->setIdproblema($row->IdProblema);
               $Problema->setDescricao($row->Descricao);
               $Problema->setEspecifico($row->Especifico);
               $Problema->setItemfinal($row->ItemFinal);
               $Problema->setSubmodulo($row->Submodulo);
                $res[] = $Problema;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($descricao,$submodulo, $especifico, $itemfinal){
        try {
            $sql = "UPDATE TbProblema
                       SET Descricao = ?,
                       SET IdSubmodulo = ?,
                       SET IdEspecifico = ?,
                       SET IdItemFinal = ?
                     
                       
                     WHERE IdProblema = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $descricao);
            $stm->bindParam(2,$submodulo);
            $stm->bindParam(3, $especifico);
            $stm->bindParam(4, $itemfinal);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($descricao, $submodulo, $especifico, $itemfinal){
      try {
        $sql = "INSERT INTO TbProblema(descricao,idsubmodulo,idespecifico, iditemfinal))
                VALUES (?,?,?,?);";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $descricao);
        $stm->bindParam(2, $submodulo);
        $stm->bindParam(3, $especifico);
        $stm->bindParam(4, $itemfinal);
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM TbProblema WHERE IdProblema = ?"; 
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