<?php
 
    function inserirProprietario($conexao,$array){
       try {
            $query = $conexao->prepare("insert into proprietario (nome, email) values (?, ?)");

            $resultado = $query->execute($array);
            
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    function alterarProprietario($conexao, $array){
        try {
            $query = $conexao->prepare("update proprietario set nome= ?, email = ? where codproprietario = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarProprietario($conexao, $array){
        try {
            $query = $conexao->prepare("delete from proprietario where codproprietario = ?");
            $resultado = $query->execute($array);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
 
    function listarProprietario($conexao){
      try {
        $query = $conexao->prepare("SELECT * FROM proprietario");      
        $query->execute();
        $proprietario = $query->fetchAll();
        return $proprietario;
      }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  

    }

     function buscarProprietario($conexao,$array){
        try {
        $query = $conexao->prepare("select * from proprietario where codproprietario=?");
        if($query->execute($array)){
            $proprietario = $query->fetch();
            return $proprietario;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function acessarProprietario($conexao,$array){
        try {
        $query = $conexao->prepare("select * from proprietario where nome=? and email=?");
        if($query->execute($array)){
            $proprietario = $query->fetch();
          if ($proprietario)
            {  
                return $proprietario;
            }
        else
            {
                return false;
            }
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    
    function pesquisarProprietario($conexao,$array){
        try{
            $query = $conexao->prepare("select * from proprietario where upper (nome) like ?");
            if($query->execute($array)){
                $proprietario = $query->fetchAll();
                
                if($proprietario){
                    return $proprietario;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
}
   ?>