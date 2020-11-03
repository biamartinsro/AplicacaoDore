<?php

include_once('ConexaoBD.php');
class Solucao {
   private $idsolucao; 
   private $descricao;
    

   function getIdsolucao() {
       return $this->idsolucao;
   }

   function getDescricao() {
       return $this->descricao;
   }

   function setIdsolucao($idsolucao) {
       $this->idsolucao = $idsolucao;
   }

   function setDescricao($descricao) {
       $this->descricao = $descricao;
   }

   function __construct($idsolucao = null, $descricao = null) {
       $this->idsolucao = $idsolucao;
       $this->descricao = $descricao;
   }

   

    public function lista(){
        try {
            $sql  = "select idsolucao, descricao from tbsolucao";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
               $Solucao = new Solucao();
               $Solucao->setIdsolucao($row->IdSolucao);
               $Solucao->setDescricao($row->Descricao);
                $res[] = $Solucao;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idproblema){
        try {
            $sql  = "select idsolucao, descricao from tbsolucao WHERE idSolucao = ".$idSolucao." ORDER BY Descricao";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
              $Solucao = new Solucao();
               $Solucao->setIdsolucao($row->IdSolucao);
               $Solucao->setDescricao($row->Descricao);
                $res[] = $Solucao;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($descricao){
        try {
            $sql = "UPDATE TbSolucao
                       SET Descricao = ?,
                                         
                       
                     WHERE IdSolucao = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $descricao);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($descricao){
      try {
        $sql = "INSERT INTO TbSolucao(descricao))
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
	      $sql = "DELETE FROM TbSolucao WHERE IdSolucao = ?"; 
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