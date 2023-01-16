<?php




function alterarPessoa($conexao, $array)
{
    try {
        $query = $conexao->prepare("update pessoa set nome = ?, email = ? where codpessoa = ?");
        $resultado = $query->execute($array);
        return $resultado;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

/*---------- Excluir Pessoa do BD: ----------*/
function deletarPessoa($conexao, $array){
    try {
        $query = $conexao->prepare("delete from pessoa where codpessoa = ?");
        $resultado = $query->execute($array);   
         return $resultado;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

}
function buscarPessoa($conexao, $array)
{
    try {
        $query = $conexao->prepare("select * from pessoa where codpessoa=?");
        if ($query->execute($array)) {
            $pessoa = $query->fetch();
            return $pessoa;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function acessarPessoa($conexao, $array)
{
    try {
        $query = $conexao->prepare("select * from pessoa where email=? and senha=?");
        if ($query->execute($array)) {
            $pessoa = $query->fetch();
            if ($pessoa) {
                return $pessoa;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
/*---------- Demonstrar Pessoas do BD: ----------*/
function listarPessoa($conexao)
{
    try {
        $query = $conexao->prepare("SELECT * FROM pessoa");
        $query->execute();
        $pessoas = $query->fetchAll();
        return $pessoas;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
function pesquisarPessoa($conexao, $array)
{
    try {
        $query = $conexao->prepare("select * from pessoa where nome like ? order by nome");
        if ($query->execute($array)) {
            $pessoa = $query->fetchAll(); //coloca os dados num array $usuario
            return $pessoa;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function listarPessoaLogada($conexao)
{
    try {
        $query = $conexao->prepare("SELECT * FROM pessoa");
        $query->execute();
        $pessoas = $query->fetchAll();
        return $pessoas;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>
