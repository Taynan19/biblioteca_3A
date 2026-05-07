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

    function buscarLeitores(){

    }

    function buscarLeitoresPorNome(){

    }

    function atualizarLeitores(){

    }

    function deletarLeitores(){

    }

?>