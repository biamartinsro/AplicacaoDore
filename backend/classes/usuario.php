<?php

include_once('ConexaoBD.php');
class Usuario {
    private $idusuario;
    private $nousuario;
    private $email;
    private $senha; 
    private $setor; 
  
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function getNousuario() {
        return $this->nousuario;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getSetor() {
        return $this->setor;
    }

    

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setNousuario($nousuario) {
        $this->nousuario = $nousuario;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setSetor($setor) {
        $this->setor = $setor;
    }


    function __construct($idusuario = null, $nousuario = null, $email = null, $senha = null, $setor = null, $permissao = null) {
        $this->idusuario = $idusuario;
        $this->nousuario = $nousuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->setor = $setor;
        $this->permissao = $permissao;
    }


    

   

    public function lista(){
        try {
            $sql  = "SELECT b.idsetor,b.nousuario, b.email, nosetor  FROM tbusuario AS b
INNER JOIN tbsetor AS i
ON b.idsetor = i.idsetor ORDER BY b.nousuario";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario();               
               
                $usuario->setNousuario($row->nome);
                $usuario->setSetor($row->nosetor);
                $usuario->setEmail($row->email);
                
                $res[] = $usuario;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idusuario){
        try {
            $sql  = "SELECT Idusuario, nome FROM tbusuario WHERE idusuario = ".$idusuario." ORDER BY Nousuario";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new usuario();                
                $usuario->setIdusuario($row->Idusuario);
                $usuario->setNousuario($row->Nousuario);
                
                $res[] = $usuario;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE Tbusuario
                       SET Nousuario = ? 
                     WHERE Idusuario = ?"; 
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
    
    public function insere($nome,$email, $senha, $setor, $permissao){
      try {
        $sql = "INSERT INTO Tbusuario(nousuario, email, senha, idsetor)
                VALUES (?, ?,?,?,?)";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $nome);
        $stm->bindParam(2, $email); 
        $stm->bindParam(3, $senha);
        $stm->bindParam(4, $setor);
        
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM Tbusuario WHERE Idusuario = ?"; 
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