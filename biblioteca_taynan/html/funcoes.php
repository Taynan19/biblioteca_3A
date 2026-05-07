<?php
    require_once "conexao.php";

    function verificarLoguin(){
        return isset($_SESSION['usuario']);
    }
    
    function verificarAdmin(){
        return (isset($_SESSION['tipo']) && ($_SESSION['tipo'] == 'admin'));
    }

    function logout(){
        session_destroy();
    }
    function loguin($conexao, $cpf, $senha){
        $sql = "SELECT * FROM leitores WHERE cpf = ? AND senha = ?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $cpf, $senha);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if($resultado->num_arows > 0){
            $usuario = $resultado->fetch_assoc();
            $_session['usuario'] = $usuario['nome'];
            $_session["tipo"] = $usuario['tipo'];
            $_sesson['id'] = $usuario['id'];

            return true;
        }

        return false;
    }


    function inserirleitor($conexao, $nome, $senha, $cpf, $telefone, $nascimento, $tipo){
        $sql = "INSERT INTO leitores (nome, senha, cpf, telefone, nascimento, tipo) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssss", $nome, $senha, $cpf, $telefone, $nascimento, $tipo);

        return $stmt->execute();

    }

    function listarLeitores($conexao){
        $sql = "SELECT * FROM leitores";
        return $conexao->query("SELECT * FROM leitores");

    }

    function buscarLeitor($conexao, $id){
        $sql = "SELECT * FROM leitores WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();

    }

    function buscarLeitorPorNome($conexao, $nome){
        $sql = "SELECT * FROM leitores WHERE nome LIKE ?";
        $stmt = $conexao->prepare($sql);

        $nomeBusca = "%" .$nome. "%";
        $stmt->bind_param("s", $nomeBusca);  
        $stmt->execute();

        return $stmt->get_result();
    }

    function atualizarLeitor($conexao, $id, $nome, $senha, $cpf, $telefone, $nascimento, $tipo){
        $sql = "UPDATE leitores SET nome = ?, senha = ?, cpf = ?, telefone = ?, nascimento = ?, tipo = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssssi", $nome, $senha, $cpf, $telefone, $nascimento, $tipo, $id);

        return $stmt->execute();

    }

    function deletarLeitor($conexao, $id){
        $sql = "DELETE FROM leitores where id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();

    }

?>