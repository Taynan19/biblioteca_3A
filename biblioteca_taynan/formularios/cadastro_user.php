<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha"><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf"><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone"><br><br>

        <label for="nascimento">Nascimento:</label>
        <input type="date" id="nascimento" name="nascimento"><br><br>

        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo">
            <option value="">Selecione</option>
            <option value="leitor">Leitor</option>
            <option value="bibliotecario">Bibliotecário</option>
        </select><br><br>

        <input type="submit" value="Cadastrar">
    </form> 
</body>
</html>