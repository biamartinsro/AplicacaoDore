<?php

include_once('ConexaoBD.php');
class Informacao {
    private $idinformacoes;
    private $descricao;
    private $setor;
   
    

    function getIdinformacoes() {
        return $this->idinformacoes;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getSetor() {
        return $this->setor;
    }

   

    function setIdinformacoes($idinformacoes) {
        $this->idinformacoes = $idinformacoes;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setSetor($setor) {
        $this->setor = $setor;
    }

   

    function __construct($idinformacoes = null, $descricao = null, $setor = null) {
        $this->idinformacoes = $idinformacoes;
        $this->descricao = $descricao;
        $this->setor = $setor;
       
    }

    

    public function lista(){
        try {
            $sql  = "SELECT C.idinformacao AS 'IdInformacao', C.descricao AS 'Descricao', F.nosetor AS 'Setor'
FROM tbinformacoes AS C
INNER JOIN tbsetor AS F ON C.idsetor = F.idsetor";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
               $informacao = new Informacao();
               $informacao->setIdinformacoes($row->IdInformacao);
               $informacao->setDescricao($row->Descricao);
               $informacao->setSetor($row->Setor);
              
                $res[] = $informacao;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idinformacoes){
        try {
            $sql  = "SELECT C.idinformacoes, C.descricao, F.nosetor, G.nome
FROM tbinformacoes AS C
INNER JOIN tbsetor AS F ON C.idsetor = F.idsetor
INNER JOIN tbusuario AS G ON C.idusuario = G.idusuario WHERE idInformacoes = ".$idInformacoes." ORDER BY Descricao";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
              $informacao = new Informacao();
               $informacao->setIdinformacoes($row->IdInformacoes);
               $informacao->setDescricao($row->Descricao);
               $informacao->setSetor($row->NoSetor);
               $informacao->setUsuario($row->Nousuario);
                $res[] = $informacao;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($descricao,$codigo){
        try {
            $sql = "UPDATE TbInformacoes
                       SET Descricao = ?,
                     
                     
                       
                     WHERE IdInformacoes = ?"; 
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
    
    public function insere($descricao, $setor, $usuario){
      try {
        $sql = "INSERT INTO TbInformacoes(descricao,idsetor,idusuario))
                VALUES (?,?,?);";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $descricao);
        $stm->bindParam(2, $setor);
        $stm->bindParam(3, $usuario);
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM TbInformacoes WHERE IdInformacoes = ?"; 
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