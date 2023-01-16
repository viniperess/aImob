<?php
 
    function inserirImovel($conexao,$array){
       try {
            $query = $conexao->prepare("insert into imovel (logradouro, numero, bairro, cep, quarto, banheiro, garagem, patio, tipo, locado, valor, imagem, codproprietario) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $resultado = $query->execute($array);
            
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    function alterarImovel($conexao, $array){
        try {
            $query = $conexao->prepare("update imovel set logradouro= ?, numero= ?, bairro= ?, cep= ?, quarto= ?, banheiro= ?, garagem= ?, patio= ?, tipo= ?, locado= ?, valor= ?, codproprietario= ? where codimovel = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarImovel($conexao, $array){
        try {
            $query = $conexao->prepare("delete from imovel where codimovel = ?");
            $resultado = $query->execute($array);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
 
    function listarImovel($conexao){
      try {
        $query = $conexao->prepare("SELECT * FROM imovel");      
        $query->execute();
        $imoveis = $query->fetchAll();
        return $imoveis;
      }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  

    }

     function buscarImovel($conexao,$array){
        try {
        $query = $conexao->prepare("select * from imovel where codimovel= ?");
        if($query->execute($array)){
            $imovel = $query->fetch();
            return $imovel;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }
    function acessarImovel($conexao,$array){
        try {
        $query = $conexao->prepare("select * from imovel where codimovel=?");
        if($query->execute($array)){
            $imovel = $query->fetch();
          if ($imovel)
            {  
                return $imovel;
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



    function pesquisarImovel($conexao,$sql){
        try{
            $query = $conexao->prepare($sql);
            if($query->execute()){
                $imovel = $query->fetchAll();
                return $imovel;
            }
            else{
                return false;
            }
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
}


function listarImovelPorCod($conexao,$array){ 
    try {
      $query = $conexao->prepare("SELECT * FROM imovel WHERE codimovel=?");      
      $query->execute($array);
      $imovel = $query->fetch();
      return $imovel;

    }catch(PDOException $e) {
          echo 'Error: ' . $e->getMessage();
    } 
 } 
?>
