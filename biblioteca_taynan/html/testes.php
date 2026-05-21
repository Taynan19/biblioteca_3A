<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 20px;
    }
    h1 {
        color: #333;
    }
    .leitor {
        background-color: #fff;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>

<?php
require_once "funcoes.php";

echo "hello world";


// echo "<h1>Inserir Leitor</h1>";

// inserirLeitor($conexao, "Neymar", "", "12345678900", "11987654321", "1992-02-05", "admin");
// echo "Leitor inserido com sucesso!";


echo "<h1>Listar Leitores</h1>";

$lista_leitor = listarLeitores($conexao);

while ($LEITOR = $lista_leitor-> fetch_assoc()){
    print_r($LEITOR);
    echo "<br><br>";
}
echo "Lista de leitores exibida com sucesso!";


?>