<?php

include_once('ConexaoBD.php');
class Problema {
    private $idproblema;
    private $descricao;
    private $solucao;
    private $itemfinal;

    /**
     * Problema constructor.
     * @param $idproblema
     * @param $descricao
     * @param $solucao
     * @param $itemfinal
     */
    public function __construct($idproblema = null, $descricao = null, $solucao = null, $itemfinal = null)
    {
        $this->idproblema = $idproblema;
        $this->descricao = $descricao;
        $this->solucao = $solucao;
        $this->itemfinal = $itemfinal;
    }

    /**
     * @return mixed
     */
    public function getIdproblema()
    {
        return $this->idproblema;
    }

    /**
     * @param mixed $idproblema
     */
    public function setIdproblema($idproblema)
    {
        $this->idproblema = $idproblema;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getSolucao()
    {
        return $this->solucao;
    }

    /**
     * @param mixed $solucao
     */
    public function setSolucao($solucao)
    {
        $this->solucao = $solucao;
    }

    /**
     * @return mixed
     */
    public function getItemfinal()
    {
        return $this->itemfinal;
    }

    /**
     * @param mixed $itemfinal
     */
    public function setItemfinal($itemfinal)
    {
        $this->itemfinal = $itemfinal;
    }






    

    public function lista(){
        try {
            $sql  = "SELECT C.idproblema AS 'IdProblema', C.descricao AS 'Descricao', c.solucao as 'Solucao',  H.noitemfinal AS 'ItemFinal'
FROM tbproblema AS C

INNER JOIN tbitemfinal AS H ON C.iditemfinal = H.iditemfinal";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
               $Problema = new Problema();
               $Problema->setIdproblema($row->IdProblema);
               $Problema->setDescricao($row->Descricao);
               $Problema->setSolucao($row->Solucao);
               $Problema->setItemfinal($row->ItemFinal);

                $res[] = $Problema;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idproblema){
        try {
            $sql  = "SELECT C.idproblema as 'IdProblema', C.descricao, c.solucao as 'Solucao', H.noitemfinal
FROM tbproblema AS C

INNER JOIN tbitemfinal AS H ON C.iditemfinal = H.iditemfinal WHERE idProblema = ".$idproblema." ORDER BY Descricao";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
              $Problema = new Problema();
               $Problema->setIdproblema($row->IdProblema);
               $Problema->setDescricao($row->descricao);
               $Problema->setSolucao($row->Solucao);
               $Problema->setItemfinal($row->noitemfinal);

                $res[] = $Problema;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($descricao,$solucao, $itemfinal, $codigo){
        try {
            $sql = "UPDATE `tbproblema` SET `descricao`=?,`solucao`=?,`iditemfinal`=? WHERE idproblema = ?";
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $descricao);
            $stm->bindParam(2,$solucao);
            $stm->bindParam(3, $itemfinal);
            $stm->bindParam(4, $$codigo);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($descricao, $solucao, $itemfinal){
      try {
        $sql = "INSERT INTO TbProblema(descricao,solucao, iditemfinal)
                VALUES (?,?,?);";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $descricao);
        $stm->bindParam(2, $solucao);
        $stm->bindParam(3, $itemfinal);
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